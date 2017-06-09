<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
  <div class="panel panel-info">
    <div class="panel-heading">Signup</div>
      <div class="panel-body">
        <p>Please fill out the following fields to signup:</p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
          <?= $form->field($model, 'username') ?>
          <?= $form->field($model, 'email') ?>
          <?= $form->field($model, 'password')->passwordInput() ?>
          <div class="form-group">
            <?= Html::submitButton('Signup', ['class' =>'btn btn-primary', 'name' => 'signup-button']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
