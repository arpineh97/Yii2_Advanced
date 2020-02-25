<?php

use yii\db\Migration;

/**
 * Class m200225_063720_categories
 */
class m200225_063720_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createCategories();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }

    private function createCategories()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200225_063720_categories cannot be reverted.\n";

        return false;
    }
    */
}
