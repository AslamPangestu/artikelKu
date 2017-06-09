<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id_artikel
 * @property string $judul
 * @property integer $id_kategori
 * @property string $author
 * @property string $created_time
 * @property string $konten
 * @property string $image_src_filename
 * @property string $image_web_filename
 *
 * @property Komentar[] $komentars
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

     const PERMISSIONS_PRIVATE = 10;
      const PERMISSIONS_PUBLIC = 20;
      public $image;

    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id_kategori'], 'integer'],
            [['created_time'], 'string', 'max'=>10],
            [['jumlah_baca'], 'integer'],
            [['konten'], 'string'],
            [['judul'], 'string', 'max' => 50],
            [['author'], 'integer'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['image_src_filename', 'image_web_filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id',
            'judul' => 'Judul',
            'id_kategori' => 'Kategori',
            'author' => 'Author',
            'created_time' => 'Created Time',
            'konten' => 'Konten',
            'image_src_filename' => Yii::t('app', 'Filename'),
            'image_web_filename' => Yii::t('app', 'Pathname'),
        ];
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($this->isNewRecord){
            $this->jumlah_baca = 0;
            $this->author = Yii::$app->user->id;
            $this->created_time = time();
        }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentars()
    {
        return $this->hasMany(Komentar::className(), ['id_artikel' => 'id_artikel']);
    }
    public static function topArtikel()
    {
        return self::find()
        ->orderBy('jumlah_baca DESC')
        ->limit(10)
        ->all();
    }
    public static function topKomentar()
    {
        return Artikel::findBySql("SELECT a . * , COUNT(
        k.id_komentar ) AS jumlah
        FROM artikel a
        LEFT JOIN komentar k ON ( k.id_artikel =
        a.id_artikel )
        GROUP BY a.id_artikel
        ORDER BY `jumlah` DESC
        LIMIT 0 , 10")
        ->all();
    }
}
