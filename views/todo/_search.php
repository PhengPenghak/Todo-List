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
        'options' => ['id' => 'formTodoSearch', 'data-pjax' => true],
        'method' => 'get',
    ]); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="input-group input-group-lg">
                    <div style="width: 70%;">
                        <p class="float-right">
                            <button type="button" value="<?= Url::to(['todo/create']) ?>" class="btn btn-outline-dark btn-sm btn-xs triggerModal ">Add Todo-List</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="input-group mb-3 ">
                    <?= $form->field($model, 'globalSearch')->textInput(['aria-label' => 'Search', 'type' => 'search', 'class' => 'form-control ', 'placeholder' => 'Search Todo.........',])->label(false) ?>
                    <?= Html::submitButton('Search', ['class' => 'btn btn-dark']) ?>
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
    // $('#todosearch-globalsearch').keyup(delay(function (e) {
    //     $('#formTodoSearch').trigger('submit');
    // }, 500));
    // var delay = (function(){
    //     var timer = 0;
    //     return function(callback, ms){
    //         clearTimeout (timer);
    //         timer = setTimeout(callback, ms);
    //     };
    //     })();
    //     $('#todosearch-globalsearch').keyup(function() {
    //         delay(function(){
    //             $('#formTodoSearch').trigger('submit');
    //         }, 1000 );
    // });
    // function delay(callback, ms) {
    //     var timer = 0;
    //     return function() {
    //         var context = this, args = arguments;
    //         clearTimeout(timer);
    //         timer = setTimeout(function () {
    //         callback.apply(context, args);
    //         }, ms || 0);
    //     };
    // }


    // $(document).on("change","#todosearch-globalsearch", function(){
    //     $('#formTodoSearch').trigger('submit');
    // });
    var timeout = null
    $('#todosearch-globalsearch').on('keyup', function() {
        var text = this.value
        clearTimeout(timeout)
        timeout = setTimeout(function() {
            $('#formTodoSearch').trigger('submit');
        }, 500)
    });
JS;
$this->registerJs($script);
?>