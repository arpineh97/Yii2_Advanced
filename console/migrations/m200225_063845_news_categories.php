<?php

use yii\db\Migration;

/**
 * Class m200225_063845_news_categories
 */
class m200225_063845_news_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createNewsCategories();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news_categories');
    }

    private function createNewsCategories()
    {
        $this->createTable('news_categories', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'categories_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'FK_news',
            'news_categories',
            'news_id',
            'news',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_categories',
            'news_categories',
            'categories_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200225_063845_news_categories cannot be reverted.\n";

        return false;
    }
    */
}
