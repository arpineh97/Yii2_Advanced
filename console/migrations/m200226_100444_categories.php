<?php

use yii\db\Migration;

/**
 * Class m200226_100444_categories
 */
class m200226_100444_categories extends Migration
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
        echo "m200226_100444_categories cannot be reverted.\n";

        return false;
    }
    */
}
