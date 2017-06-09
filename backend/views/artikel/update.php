<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */

$this->title = 'Update Artikel: ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artikel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
