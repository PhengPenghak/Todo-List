<?php

namespace app\controllers;

use app\models\Todo;
use app\models\TodoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TodoController implements the CRUD actions for Todo model.
 */
class TodoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Todo models.
     *
     * @return string
     */
    public function actionIndex($show = 'all')
    {

        $searchModel = new TodoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionChangebtn($id, $status)
    {
        if ($status == 1) {
            $newstatus = 0;
        } else ($newstatus = 1);

        $todo = Todo::findOne($id);
        $todo->status = $newstatus;
        $todo->save();
        return $this->redirect(['index']);
    }

    /**
     * Displays a single Todo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Todo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Todo();
        $todo = Todo::find()->all();
        $request = Yii::$app->request;
        // $show = $request->get('show');
        // echo $show;
        // exit;
        if ($this->request->isPost) {
            if ($this->request->ispost && $model->load($this->request->post())) {

                $model->status = 0;
                $model->save();
                return $this->redirect(Yii::$app->request->referrer);
            }

        } else {
            $model->loadDefaultValues();
        }


        return $this->render('create', [
            'model' => $model,
            'todo' => $todo,

        ]);
    }

    /**
     * Updates an existing Todo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Todo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Todo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Todo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Todo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}