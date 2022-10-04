<style>

</style>
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
use yii\bootstrap5\ButtonDropdown;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\TodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
<<<<<<< HEAD
    @media (max-width:575.98px) {
=======
    @media (max-width: 575.98px) {
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
        .card-body {
            padding: .5rem;
        }

        h5.card-title {
            font-size: .7rem;
        }

<<<<<<< HEAD
        span.query_task {

            font-size: .7rem !important;
        }

=======
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
        select[name='dateFilter'] {
            min-height: calc(1.5em + (.5rem + 2px));
            padding: .25rem .5rem;
            font-size: .6rem;
            border-radius: .2rem;
        }

        h1.countingNumber {
            font-size: 1.2rem;
            margin-top: 5px;
        }

<<<<<<< HEAD
        small.query_title {
            font-size: .5rem !important;
        }

        #blankheight {
            height: 24.4px;
        }

        .search_global {
            font-size: .6rem;
        }

        .btn_search {
            font-size: .6rem;
            display: none;
        }

        .add_todo {
            font-size: .6rem;
        }

        .size_icon {
            display: grid;
            width: 33px;
            margin: 4px;
        }

        .title_size {
            font-size: 8px;
        }

        .footer_size {
            font-size: 12px;
        }

        #w1>ul>li.page-item>a {
            font-size: .7rem;

        }

        #w0>table>thead {
            font-size: .7rem;
        }

        #w0>table>tbody {
            font-size: .7rem;
            vertical-align: middle;
        }

        .summary {
            display: none;
        }

        #w0>table>tbody>tr:nth-child(3)>td:nth-child(3)>a {
            font-size: smaller;
        }
=======
        #blankheight {
            height: 24.4px;
        }
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
    }
</style>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row my-5 body">
<<<<<<< HEAD
            <div class="col-lg col-6">
=======
            <div class="col-lg col-6 ">
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
                <div class="card border-success mt-2">
                    <div class="card-body" id="countByDateType">
                        <h5 class="card-title ">Previous month tasks </h5>
                        <?= Html::dropDownList(
                            'dateFilter',
                            $datetype,
                            $drowdown,
<<<<<<< HEAD
                            ['class' => 'form-control isSelect2 dateFilter']
=======
                            ['class' => 'form-control dateFilter']
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
                        )
                        ?>
                        <h1 class="countingNumber"><?= $countByDateType ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg col-6">
                <div class="card border-danger mt-2">
                    <div class="card-body" id="totalLastWeek">
<<<<<<< HEAD
                        <h5 class="card-title ">Previous week tasks </h5>
=======
                        <h5 class="card-title">Previous week tasks </h5>
>>>>>>> b599b75e3a75ef024ff6054ac23deecdcbc4cf69
                        <div id="blankheight"></div>
                        <h1 class="countingNumber"><?= $totalLastWeek ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg col-4">
                <div class="card border-secondary mt-2">
                    <div class="card-body">
                        <small class="float-end text-muted query_title">Query task result</small>
                        <div class="clearfix"></div>
                        <h1 class="countingNumber"> <?= $totalTodos ?>
                            <span class="ml-2 fs-5 query_task">All</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-lg col-4">
                <div class="card border-primary mt-2">
                    <div class="card-body">
                        <small class="float-end text-muted query_title">Query task result</small>
                        <div class="clearfix"></div>
                        <h1 class="countingNumber"><?= $totalDoneTodos ?> <span class="ml-2 fs-5 query_task">Done</span></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg col-4">
                <div class="card border-warning mt-2">
                    <div class="card-body">
                        <small class="float-end text-muted query_task query_title">Query task result</small>
                        <div class="clearfix"></div>
                        <h1 class="countingNumber"><?= $totalNotDoneTodos ?> <span class="ml-2 fs-5 query_task">Not done</span></h1>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php Pjax::begin(['id' => 'data-pjax']); ?>
    <?php
    Modal::begin([
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
            'class' => 'table table-hover ',
        ],
        'pager' => [
            // 'firstPageLabel' => 'First',
            // 'lastPageLabel' => 'Last',
            'class' => LinkPager::class,

        ],
        'layout' => '
        {items}
        <div class="row ">
            <div class="col col-md-4">
                {pager}
            </div>
            <div class="col col-md-4">
                {summary}
            </div>
            <div class="col col-md-4">
            <div class="d-flex justify-content-end button ">
                <label>
                    <a href="' . Url::to(['todo/index',]) . '" class="btn btn-sm footer_size">All</a>
                </label>
                <label>
                    <a href="' . Url::to(['todo/index', 'status' => 1]) . ' " class="btn btn-sm footer_size">Done</a>
                </label>
                <label>
                    <a href="' . Url::to(['todo/index', 'status' => 0]) . '" class="btn btn-sm footer_size">Not Done</a>
                </label>
            </div>
        </div>
            
        </div>
        ',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [

                'attribute' => 'title',
                'contentOptions' => ['class' => 'title_size'],
            ],

            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return Html::a('Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-info btn-sm btn-xs title_size']);
                    } else {
                        return Html::a('Not Done', ['todo/changebtn', 'id' => $model->id, 'status' => $model->status], ['class' => 'btn btn-outline-warning btn-sm  btn-xs title_size']);
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
                'contentOptions' => ['class' => 'title_size'],

            ],



            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{view} {update} {delete} {dropdown}',
                'options' => ['class' => 'text-primary'],
                'buttons' => [

                    'view' => function ($url, $model) {
                        $label = '<span class="d-none d-lg-inline-block">View &nbsp;</span>';
                        return Html::a($label . '<i class="fas fa-eye"></i>', $url, ['class' => 'btn btn-outline-secondary btn-sm btn-xs size_icon d-none d-lg-inline-block']);
                    },

                    'update' => function ($url, $model) {
                        $label = '<span class="d-none d-lg-inline-block">Edit &nbsp;</span>';
                        return Html::a($label . ' <i class="fas fa-pen"></i>', "#", [
                            'class' => 'btn btn-outline-info btn-sm btn-xs triggerModal size_icon d-none d-lg-inline-block',
                            'value' => Url::to(['todo/update', 'id' => $model->id]),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        $label = '<span class="d-none d-lg-inline-block">Delete &nbsp;</span>';
                        return Html::a($label . ' <i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                            'data-method' => 'post', 'data-pjax' => '0',
                            'class' => 'btn btn-outline-dark btn-sm btn-xs size_icon d-none d-lg-inline-block'
                        ]);
                    },

                    'dropdown' => function ($url, $model) {

                        $urlView = Url::toRoute(['todo/view', 'id' => $model->id]);
                        $urlUpdate = Url::to(['todo/update', '1', 'id' => $model->id]);
                        $urlDelete = Url::toRoute(['todo/delete', 'id' => $model->id]);
                        return "<div class='dropdown d-sm-none'>
                        <button class='btn btn-danger-sm dropdown-toggle ' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                        
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <li><a class='dropdown-item title_size' data-pjax='0' href='{$urlView}'>View</a></li>
                            <li><a class='dropdown-item title_size triggerModal' data-pajx='0' value ='{$urlUpdate}',>Edit
                                
                            </a></li>
                            <li><a class='dropdown-item title_size'data-method = 'post' data-pjax='0' href='{$urlDelete}'>Delete</a></li>
                        </ul>
                    </div>";
                    },

                ],

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

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