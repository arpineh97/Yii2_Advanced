<?php

use yii\db\Migration;

/**
 * Class m200302_114318_create_default_admin
 */
class m200302_114318_create_default_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createAdmin();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200302_114318_create_default_admin cannot be reverted.\n";

        return false;
    }

    private function createAdmin () {
        $admin = new \common\models\User();
        $admin-> username = 'admin';
        $admin->setPassword('jichangwook97');
        $admin->email = 'oooano55@mail.ru';
        $admin->status = 10;
        $admin->generateAuthKey();
        $admin->save();
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200302_114318_create_default_admin cannot be reverted.\n";

        return false;
    }
    */
}
