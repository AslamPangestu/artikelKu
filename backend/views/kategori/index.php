<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index panel panel-info">

  <div class="panel-heading">
      <h4><?= Html::encode($this->title) ?>
          <span class="pull-right">
              <?= Html::a('Tambah Kategori', ['create'], ['class' =>
              'btn btn-primary btn-sm']) ?>
              <?= Html::a('Artikel', ['/artikel'], ['class' => 'btn
              btn-danger btn-sm']) ?>
          </span>
      </h4>
  </div>
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_kategori',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
  </div>
</div>
