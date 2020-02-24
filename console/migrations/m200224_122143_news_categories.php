<?php

use yii\db\Migration;

/**
 * Class m200224_122143_news_categories
 */
class m200224_122143_news_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createNews();
        $this->createCategories();
        $this->createNewsCategories();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
        $this->dropTable('categories');
        $this->dropTable('news_categories');
    }

    private function createNews()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->string()
        ]);
        $this->alterColumn('news', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createCategories()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        $this->alterColumn('categories', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    private function createNewsCategories()
    {
        $this->createTable('news_categories', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'categories_id' => $this->integer()
        ]);
        //if there will be 2 primary keys (author_id and book_id) without id - migrate will done successfully
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
        $this->alterColumn('news_categories', 'id', $this->integer() . 'NOT NULL AUTO_INCREMENT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200224_122143_news_categories cannot be reverted.\n";

        return false;
    }
    */
}
