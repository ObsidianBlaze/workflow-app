<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%level}}`.
 */
class m220213_133836_create_level_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%level}}', [
            'id' => $this->primaryKey(),
            //Setting the default value of the level to 0
            'level' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%level}}');
    }
}
