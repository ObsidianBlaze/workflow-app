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
            'status' => $this->string(20),
            'user_id' => $this->integer(),
            'request_clearance_level' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
