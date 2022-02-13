<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220213_134304_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(200),
            'lastname' => $this->string(200),
            'email' => $this->string(200)->unique(),
            'level_id' => $this->integer()->defaultValue(1),
            'dept_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()

        ]);

        //Creating foreign key
        $this->addForeignKey('FK_users_level_level_id','{{%users}}','level_id','{{%level}}','id');

        $this->addForeignKey('FK_users_department_dept_id','{{%users}}','dept_id','{{%department}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //Droping foreign key
        $this->dropForeignKey('FK_users_level_level_id','{{%users}}');
        $this->dropForeignKey('FK_users_department_dept_id','{{%users}}');


        $this->dropTable('{{%users}}');
    }
}
