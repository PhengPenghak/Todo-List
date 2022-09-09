<?php

use app\models\Todo;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$base_url = Yii::getAlias("@web");

?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-8">
        <div class="card">
          <div class="card-body p-5">
            <h1>Todo List</h1>
            <?php
            $form = ActiveForm::begin([
              'id' => 'active-form',
              'options' => [
                'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data'
              ],
            ])
            ?>

            <form class="d-flex justify-content-center align-items-center col-lg-4">
              <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Enter Todo']) ?>
              <?= Html::submitButton('Submit', ['class' => 'btn btn-outline-warning btn-sm ']) ?>
            </form>
          </div>
          <?php ActiveForm::end(); ?>

          <table class="table table-hover">
            <?php
            foreach ($todo as $key => $todo) {
            ?>
              <tbody>
                <tr>
                  <td><?= $todo->title ?></td>
                  <td style="text-align:right">
                    <a href="<?= Url::to(['site/changebtn', 'id' => $todo->id, 'status' => $todo->status]) ?>" class="btn btn-outline-warning btn-sm"><?= $todo->status == 1 ? 'Done' : 'Not Done' ?>
                    </a>
                    <?php
                    echo Html::a('Remove', ['delete', 'id' => $todo->id], ['class' => 'btn btn-outline-warning btn-sm'])
                    ?>

                  </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <?php
                $count = Todo::find()->count();
                echo $count . 'To-Do Item.';
                ?>
              </div>
              <div class="col-lg-6" style="text-align: right;">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <a href="<?= Url::to(['site/todo', 'show' => 'all']) ?>" class="btn btn-sm">All</a>
                  </label>
                  <label class="btn btn-secondary ">
                    <a href="<?= Url::to(['site/todo', 'show' => 'done']) ?>" class="btn btn-sm">Done</a>
                  </label>
                  <label class="btn btn-secondary">
                    <a href="<?= Url::to(['site/todo', 'show' => 'not_done']) ?>" class="btn btn-sm">Not Done</a>
                  </label>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<?php
$script = <<<JS
$('.btn-remove-item').on('click', function(e){
    e.preventDefault();
    var id = $(this).closest('.btn-remove-item').data('id');
    $.ajax({
        url: "$base_url"+"/site/todo",
        method: 'POST',
        data: {
            id: id,
            action: "todo"
        },
        success: function(res){
            var data = JSON.parse(res);
        },
        error: function(err){
            console.log(err);
        }
    });
});

JS;
$this->registerJs($script);

?>