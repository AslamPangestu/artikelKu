<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */

$this->title = $model->id_artikel;
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_artikel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_artikel], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_artikel',
            'judul',
            'id_kategori',
            'jumlah_baca',
            'author',
            'created_time',
            'konten:ntext',
            'image_src_filename',
            'image_web_filename',
        ],
    ]) ?>
    <?php
       if ($model->image_web_filename!='') {
         echo '<br /><p>'.Html::img('@web/uploads/'.$model->image_web_filename).'</p>';
       }
    ?>

</div>
