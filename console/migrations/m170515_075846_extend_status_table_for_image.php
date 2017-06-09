<?php

use yii\db\Schema;
use yii\db\Migration;

class m170515_075846_extend_status_table_for_image extends Migration
{
  public function up()
    {
      $tableOptions = null;
      if ($this->db->driverName === 'mysql') {
          $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
      }
      $this->addColumn('{{%artikel}}','image_src_filename',Schema::TYPE_STRING.' NOT NULL');
      $this->addColumn('{{%artikel}}','image_web_filename',Schema::TYPE_STRING.' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%artikel}}','image_src_filename');
        $this->dropColumn('{{%artikel}}','image_web_filename');
        return false;
    }
}
