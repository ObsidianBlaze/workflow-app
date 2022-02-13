<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property int|null $level_id
 * @property int|null $dept_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Department $dept
 * @property Level $level
 * @property Request[] $requests
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_id', 'dept_id', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 200],
            [['email'], 'unique'],
            [['dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dept_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'level_id' => 'Level ID',
            'dept_id' => 'Dept ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Dept]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\DepartmentQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'dept_id']);
    }

    /**
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LevelQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RequestQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UsersQuery(get_called_class());
    }
}
