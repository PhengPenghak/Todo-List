<?php

use app\models\Todo;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\ButtonGroup;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
    'action' => ['todo'],
    'method' => 'get',

]); ?>

<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    Modal::begin([
        'title' => 'Create Todo',
        'id' => 'modal',
        'size' => 'modal-md',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',

            ],

            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return Html::a('Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-info']);
                    } else {
                        return Html::a('Not Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-warning']);
                    }
                }
            ],
            [
                'attribute' => 'create_at',
                'format' => 'datetime',
                'contentOptions' => ['style' => 'white-space:nowrap'],

            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }, 'header' => 'action',
            ],
        ],




    ]); ?>


    <label>
        <a href="<?= Url::to(['todo/index',]) ?>" class="btn btn-sm">All</a>
    </label>
    <label>
        <a href="<?= Url::to(['todo/index', 'status' => 1]) ?>" class="btn btn-sm">Done</a>
    </label>
    <label>
        <a href="<?= Url::to(['todo/index', 'status' => 0]) ?>" class="btn btn-sm">Not Done</a>
    </label>

</div>
<?php
$script = <<<JS
    $(".triggerModal").click(function () {
        $("#modal")
        .modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));   
       
    });
JS;
$this->registerJs($script);
?>