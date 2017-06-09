<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\widgets\ListView;
    use common\models\Kategori;
    use common\models\User;
    $this->title = Yii::$app->name .' - '. $model->judul;
?>
<div class="content">
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
      <h1 align="center"><?= Html::a($model->judul, ['view','id' => $model->id_artikel]) ?></h1>
      </br>
      <img width="590px" height="250px" src="/tugasweb/administrator/uploads/<?=nl2br($model->image_web_filename)?>">
      </br>
      <?= nl2br($model->konten)?>
    </div>
</div>
<br />
<br />
<div class="panel panel-info">
    <div class="panel-heading">Komentar</div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['options' => ['style' => 'font-size: 80%']]); ?>
        <?= $form->field($komentarForm, 'id_artikel')->hiddenInput(['value' => $model->id_artikel])->label(false) ?>
        <?= $form->field($komentarForm, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($komentarForm, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($komentarForm, 'komentar')->textarea(['rows' => 6]) ?>
        <div class="form-group">
            <?= Html::submitButton('Kirim', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<hr />
<h3><i>Komentar</i></h3>
<?= ListView::widget([
    'dataProvider' => $dataProviderKomentar,
    'layout' => "{items}\n{pager}",
    'itemOptions' => ['class' => 'item'],
    'itemView' => '_itemKomentar'
]) ?>
