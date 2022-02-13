<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%level}}".
 *
 * @property int $id
 * @property int|null $level
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Users[] $users
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%level}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
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
        return $this->hasMany(Users::className(), ['level_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LevelQuery(get_called_class());
    }
}