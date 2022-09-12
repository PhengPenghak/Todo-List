<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Todo $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="todo-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Enter Todo']) ?>

    <div class="form-group text-left">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>