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
                        <button type="button" value="<?= Url::to(['todo/create']) ?>" class="btn btn-success triggerModal ">Add Product</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="input-group mb-3">
                <?= $form->field($model, 'globalSearch')->textInput(['aria-label' => 'Search', 'type' => 'search', 'class' => 'form-control form-control-navbar', 'placeholder' => 'Search Todo.........'])->label(false) ?>
                <div class="input-group-prepend">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                </div>
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
JS;
$this->registerJs($script);
?>