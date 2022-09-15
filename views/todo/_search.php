<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\TodoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="todo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="input-group input-group-sm mb-3">
                <div style="width: 70%;">
                    <p class="float-right">
                        <button type="button" value="<?= Url::to(['todo/create']) ?>" class="btn btn-outline-dark btn-sm btn-xs triggerModal ">Add Todo-List</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="input-group mb-3">
                <?= $form->field($model, 'globalSearch')->textInput(['aria-label' => 'Search', 'type' => 'search', 'class' => 'form-control ', 'placeholder' => 'Search Todo.........'])->label(false) ?>
                <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-dark']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$script = <<<JS
    $(".triggerModal").click(function () {
        $("#modal")
        .modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));   
       
    });
    

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);


JS;
$this->registerJs($script);
?>