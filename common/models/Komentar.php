<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "komentar".
 *
 * @property integer $id_komentar
 * @property integer $id_artikel
 * @property string $nama
 * @property string $email
 * @property string $komentar
 * @property string $created_time
 *
 * @property Artikel $idArtikel
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel'], 'integer'],
            [['komentar'], 'string'],
            [['created_time'], 'safe'],
            [['nama'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['id_artikel'], 'exist', 'skipOnError' => true, 'targetClass' => Artikel::className(), 'targetAttribute' => ['id_artikel' => 'id_artikel']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_komentar' => 'Id Komentar',
            'id_artikel' => 'Id Artikel',
            'nama' => 'Nama',
            'email' => 'Email',
            'komentar' => 'Komentar',
            'created_time' => 'Created Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArtikel()
    {
        return $this->hasOne(Artikel::className(), ['id_artikel' => 'id_artikel']);
    }
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($this->isNewRecord)
        {
            $this->created_time = time();
        }
        return true;
    }
}
