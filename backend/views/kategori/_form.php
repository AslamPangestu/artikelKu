<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-form">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>
            <?= $this->title ?>
                <span class="pull-right">
                    <?= Html::a('Kembali', ['index'], ['class' =>
                    'btn btn-danger btn-sm']) ?>
                </span>
            </h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'col-md-4'
                ]
            ]); ?>
            <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
      </div>
  </div>
</div>
