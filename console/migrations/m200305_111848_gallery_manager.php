<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200305_111848_gallery_manager
 */
class m200305_111848_gallery_manager extends Migration
{
    public $tableName = '{{%gallery_image}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            $this->tableName,
            array(
                'id' => Schema::TYPE_PK,
                'type' => Schema::TYPE_STRING,
                'ownerId' => Schema::TYPE_STRING . ' NOT NULL',
                'rank' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'name' => Schema::TYPE_STRING,
                'description' => Schema::TYPE_TEXT
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200305_111848_gallery_manager cannot be reverted.\n";

        return false;
    }
    */
}
