<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220213_134304_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(200),
            'lastname' => $this->string(200),
            'email' => $this->string(200)->unique(),
            'level_id' => $this->integer()->defaultValue(1),
            'dept_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        //Creating foreign key
        $this->addForeignKey('FK_user_level_level_id','{{%user}}','level_id','{{%level}}','id');

        $this->addForeignKey('FK_user_department_dept_id','{{%user}}','dept_id','{{%department}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //Droping foreign key
        $this->dropForeignKey('FK_user_level_level_id','{{%user}}');
        $this->dropForeignKey('FK_user_department_dept_id','{{%user}}');


        $this->dropTable('{{%user}}');
    }
}
