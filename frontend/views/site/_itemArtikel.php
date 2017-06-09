<?php
use yii\helpers\Html;
use common\models\Kategori;
use common\models\User;
?>
<div class="content" style="border-radius: 25px;
    border: 2px solid #1a6ecc;
    padding: 20px;
    margin-bottom: 5px;">
  <div class="content-title"><?= Html::a($model->judul, ['view','id' => $model->id_artikel]) ?></div>
  <div class="content-detail">
    Tanggal : <strong><?= date('d-m-Y', $model->created_time)?></strong>
    &nbsp; | &nbsp;
    Oleh : <strong><?= User::findOne($model->author)->username ?></strong>
    &nbsp; | &nbsp;
    Komentar : <strong><?= count($model->komentars)?></strong>
    &nbsp; | &nbsp;
    Dilihat : <strong><?= $model->jumlah_baca?></strong>
    &nbsp; | &nbsp;
    Kategori : <strong><?= Kategori::findOne($model->id_kategori)->nama_kategori?></strong>
  </div>
  <div class="content-fill">
    <p style="text-align: justify"><?=
    substr(strip_tags($model->konten),0,300)?></p>
    <?= Html::a('Selengkapnya',
    ['view','id'=>$model->id_artikel],
    ['class' => 'btn btn-sm btn-primary'])?>
  </div>
</div>
