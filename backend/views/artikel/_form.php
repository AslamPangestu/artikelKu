<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-form">
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
          <?php
            $form = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data']]); // important
                 ?>

            <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_kategori')->dropDownList(
                    ArrayHelper::map(
                        common\models\Kategori::find()->all(),
                            'id_kategori',
                            'nama_kategori'
                    )
                ) ?>


            <?= $form->field($model, 'konten')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
            ]);   ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
      </div>
  </div>
</div>
