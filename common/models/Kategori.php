<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $id_kategori
 * @property string $nama_kategori
 *
 * @property Artikel[] $artikels
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'nama_kategori' => 'Nama Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikels()
    {
        return $this->hasMany(Artikel::className(), ['id_kategori' => 'id_kategori']);
    }

    public static function getKategoriMenu()
    {
        $ar = [];
        foreach(Kategori::find()->all() as $row)
        {
            $ar[] = ['label' => $row->nama_kategori, 'url' =>
            ['/site/index', 'kategori' => $row->id_kategori]];
        }
        return $ar;
    }
}
