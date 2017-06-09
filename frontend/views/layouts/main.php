<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

raoul2000\bootswatch\BootswatchAsset::$theme = 'cosmo';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Kategori', 'items' =>common\models\Kategori::getKategoriMenu()],
            ['label' => 'Signup', 'url' => ['/site/signup'],'visible' => Yii::$app->user->isGuest],
            ['label' => 'Login', 'url' => ['/administrator/site/login'],'visible' => Yii::$app->user->isGuest],
            [
              'label' => Logout,
              'url' => ['/site/logout'],
              'visible' => !Yii::$app->user->isGuest,
              'linkOptions' => ['data-method' => 'post']
            ]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid" style="background: #fff;margin-top: 50px">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="jumbotron" style="background: #f0f0f0;margin-top: 20px; padding-top: 10px; padding-bottom: 10px">
                  <h1><?=Yii::$app->name?></h1>
                  <p class="lead">Selamat datang di website ArtikelKu.<br>
                    Tambah Pemahamanmu dengan membaca berbagai artikel berikut dengan bermacam kategori kesukaanmu.<br>Karena membaca adalah jembatan  dunia.</p>
                </div>
            </div>
        </div>
        <div class="row-fluid" style="width:1000px; margin-left:160px;">
            <div class="col-md-9">
              <div style="background: #f0f0f0; padding:20px;">
                <?= $content ?>
              </div>

              </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Top Artikel</div>
                    <div class="panel-body">
                        <ul>
                        <?php foreach(common\models\Artikel::topArtikel() as $row): ?>
                          <li><?= Html::a($row->judul .'
                          ('.$row->jumlah_baca.')', ['view', 'id' => $row->id_artikel])
                          ?></li>
                        <?php endforeach; ?>
                          </ul>
                    </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Komentar Terbanyak</div>
                  <div class="panel-body">
                  <ul>
                  <?php
                  foreach(common\models\Artikel::topKomentar() as $row): ?>
                  <li><?= Html::a($row->judul .' ('.
                  count($row->komentars).')', ['view', 'id' => $row->id_artikel])
                  ?></li>
                  <?php endforeach; ?>
                  </ul>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; STT NF <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
