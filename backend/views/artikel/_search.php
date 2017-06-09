<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArtikelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_artikel') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'id_kategori') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'konten') ?>

    <?php // echo $form->field($model, 'image_src_filename') ?>

    <?php // echo $form->field($model, 'image_web_filename') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
