<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_phones}}`.
 */
class m220613_094114_create_users_phones_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_phones}}', [
            'id' => $this->primaryKey(),
            'phone'=>$this->string(12),
            'id_users'=>$this->integer()
        ]);
        $this->addForeignKey('id_users','users_phones','id_users','users','id','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_phones}}');
    }
}
