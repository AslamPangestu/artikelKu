<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Kategori;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index panel panel-info">

    <div class="panel-heading">
        <h4><?= Html::encode($this->title) ?>
            <span class="pull-right">
                <?= Html::a('Tambah Artikel', ['create'], ['class' =>
                'btn btn-primary btn-sm']) ?>
                <?= Html::a('Kategori', ['/kategori'], ['class' =>
                'btn btn-danger btn-sm']) ?>
            </span>
        </h4>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_artikel',
                'judul',
                [
                  'label'=>'Kategori',
                  'attribute'=>'id_kategori',
                  'content'=>function($data){
                    return Kategori::findOne($data->id_kategori)->nama_kategori;
                  }
                ],
                'jumlah_baca',
                [
                  'label'=>'Author',
                  'attribute'=>'author',
                  'content'=>function($data){
                    return User::findOne($data->author)->username;
                  }
                ],
                'created_time:date',
                'konten:ntext',
                [
                         'attribute' => 'Image',
                         'format' => 'raw',
                         'value' => function ($model) {
                            if ($model->image_web_filename!='')
                              return '<img src="'.Yii::$app->homeUrl. '/uploads/'.$model->image_web_filename.'" width="50px" height="auto">'; else return 'no image';
                         },
                       ],
                      ['class' => 'yii\grid\ActionColumn',
                          'template'=>'{view} {update} {delete}',
                            'buttons'=>[
                       'view' => function ($url, $model) {
                         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view','id'=>$model->id_artikel], ['title' => Yii::t('yii', 'View'),]);
                                  }
                                ],
                      ],
            ],
        ]); ?>
    </div>
</div>
