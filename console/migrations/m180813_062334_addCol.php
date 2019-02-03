<?php

use yii\db\Migration;

/**
 * Class m180813_062334_addCol
 */
class m180813_062334_addCol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'pw', $this->string(100)->unsigned()->comment('Пароль'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'pw');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_062334_addCol cannot be reverted.\n";

        return false;
    }
    */
}
