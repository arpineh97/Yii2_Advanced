<?php

use yii\db\Migration;

/**
 * Class m200225_063609_news
 */
class m200225_063609_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createNews();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }

    private function createNews()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->string()
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200225_063609_news cannot be reverted.\n";

        return false;
    }
    */
}
