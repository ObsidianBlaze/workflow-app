<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%department}}".
 *
 * @property int $id
 * @property string|null $dept_name
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Users[] $users
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%department}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['dept_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dept_name' => 'Dept Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UsersQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['dept_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DepartmentQuery(get_called_class());
    }
}
