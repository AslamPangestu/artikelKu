<?php

/* @var $this yii\web\View */

$this->title = 'Backend ArtikelKu';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hallo <?=Yii::$app->user->identity->username?></h1>

        <p class="lead">
          <?= 'Selamat datang di bagian belakang dari website '. Yii::$app->name?>
          <br>
          Disini kalian bisa menambah artikel untuk website kami
          <br>
          Untuk menambah artikel silahkan menekan tombol dibawah ini
        </p>
        <img src="http://www.animatedimages.org/data/media/111/animated-arrow-image-0147.gif" border="0" alt="animated-arrow-image-0147"/>
        <br>
        <br>
        <p><a class="btn btn-lg btn-success" href="/tugasweb/administrator/artikel">Tambah Artikel</a></p>
    </div>
</div>
