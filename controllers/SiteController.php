<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Todo;
use PhpParser\Node\Expr\AssignOp\Mod;
use PhpParser\Node\Stmt\Switch_;
use Symfony\Component\Finder\Finder;
use yii\base\Model;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('todo/index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionTodo($show = 'all')
    {

        $model = new Todo();
        $todo = Todo::find()->all();

        if ($this->request->ispost && $model->load($this->request->post())) {

            $model->status = 0;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }

        switch ($show) {
            case 'all':
                $todo = Todo::find()->all();
                break;

            case 'done':
                $todo = Todo::find()->where(['status' => 1])->all();
                break;
            case 'not_done':
                $todo = Todo::find()->where(['status' => 0])->all();
                break;
        }
        return $this->render(
            'todo',
            [
                'model' => $model,
                'todo' => $todo,
            ]
        );
    }
    public function actionDelete($id)
    {
        $data = Todo::findOne($id);
        $data->delete();
        return $this->redirect(['todo']);
    }
    public function actionChangebtn($id, $status)
    {
        if ($status == 1) {
            $newstatus = 0;
        } else ($newstatus = 1);

        $todo = Todo::findOne($id);
        $todo->status = $newstatus;
        $todo->save();
        return $this->redirect(['todo']);
    }
}
