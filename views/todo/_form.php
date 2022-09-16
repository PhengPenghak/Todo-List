<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use keygenqt\datePicker\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Todo $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>
    <form action="">
        <label for="date">DATE:</label>
        <input type="date" id="date" name="date">
        <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>
    </form>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Enter Todo.....']) ?>

    <div class="form-group p-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-dark ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>