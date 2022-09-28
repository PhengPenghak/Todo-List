<?php

use app\models\Todo;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\ButtonGroup;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\base\Theme;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var app\models\TodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row my-5">
        <div class="col-3">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title">Previous month tasks </h5>
                    <?= Html::dropDownList(
                        'dateFilter',
                        $datetype,
                        $drowdown,
                        ['class' => 'form-control isSelect2']
                    )
                    ?>
                    <h1><?= $countByDateType ?></h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title">Previous week tasks </h5>
                    <h1><?= $totalLastWeek ?></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-secondary">
                <div class="card-body">
                    <small class="float-end text-muted">Query task result</small>
                    <div class="clearfix"></div>
                    <h1> <?= $totalTodos ?>
                        <span class="ml-2 fs-5">All</span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-primary">
                <div class="card-body">
                    <small class="float-end text-muted">Query task result</small>
                    <div class="clearfix"></div>
                    <h1><?= $totalDoneTodos ?> <span class="ml-2 fs-5">Done</span></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-warning">
                <div class="card-body">
                    <small class="float-end text-muted">Query task result</small>
                    <div class="clearfix"></div>
                    <h1><?= $totalNotDoneTodos ?> <span class="ml-2 fs-5">Not done</span></h1>
                </div>
            </div>
        </div>

    </div>
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
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover',
        ],

        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
            'class' => LinkPager::class,
        ],
        'layout' => '
        {items}
        <div class="row mb-3">
            <div class="col">
                {pager}
            </div>
            <div class="col">
                {summary}
            </div>
            <div class="col">
            <div class="d-flex justify-content-end button">
            <label>
                <a href="' . Url::to(['todo/index',]) . '" class="btn btn-sm">All</a>
            </label>
            <label>
                <a href="' . Url::to(['todo/index', 'status' => 1]) . ' " class="btn btn-sm">Done</a>
            </label>
            <label>
                <a href="' . Url::to(['todo/index', 'status' => 0]) . '" class="btn btn-sm ">Not Done</a>
            </label>
        </div>
        </div>
            
        </div>
        ',
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
                        return Html::a('Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-info btn-sm btn-xs']);
                    } else {
                        return Html::a('Not Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-warning btn-sm btn-xs']);
                    }
                }
            ],
            // [
            //     'attribute' => 'create_at',
            //     'format' => 'datetime',
            //     'contentOptions' => ['style' => 'white-space:nowrap'],

            // ],
            [
                'attribute' => 'date',
                'format' => 'datetime',

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('View <i class="fas fa-eye"></i>', $url, ['class' => 'btn btn-outline-secondary btn-sm btn-xs ']);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('Update <i class="fas fa-pen"></i>', "#", [
                            'class' => 'btn btn-outline-info btn-sm btn-xs triggerModal',
                            'value' => Url::to(['todo/update', 'id' => $model->id]),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('Delete <i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                            'data-method' => 'post', 'data-pjax' => '0',
                            'class' => 'btn btn-outline-dark btn-sm btn-xs'
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>



</div>
<?php
$script = <<<JS
    $("select[name='dateFilter']").change(function(){
        var value = $(this).val();
        var url = new URL(window.location.href);
        url.searchParams.set('datetype',value);
        window.location.href = url.href;
    });
JS;
$this->registerJS($script);
?>