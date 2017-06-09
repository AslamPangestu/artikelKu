<?php
use yii\helpers\Html;
?>
<div class="panel panel-success">
    <div class="panel-heading"><?= $model->nama ?></div>
    <div class="panel-body">
        <?= Html::encode($model->komentar) ?>
    </div>
</div>
