<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m220213_134343_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string(20)->defaultValue('pending'),
            'user_id' => $this->integer(),
            'request_clearance_level' => $this->integer()->defaultValue(1),
            'request' => $this->string(200),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        //Creating foreign key
        $this->addForeignKey('FK_request_user_user_id','{{%request}}','user_id','{{%user}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //Dropping foreign key
        $this->dropForeignKey('FK_request_user_user_id','{{%request}}');
        $this->dropTable('{{%request}}');
    }
}
