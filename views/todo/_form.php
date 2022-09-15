<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Todo $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>
    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <i class="fa fa-caret-down"></i>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Enter Todo.....']) ?>

    <div class="form-group p-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-dark ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>