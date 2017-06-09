<?php

use yii\widgets\ListView;
    $this->title = Yii::$app->name;
    echo ListView::widget([
        'dataProvider' => $dataProviderArtikel,
        'layout' => "{items}\n{pager}",
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_itemArtikel'
    ]);
