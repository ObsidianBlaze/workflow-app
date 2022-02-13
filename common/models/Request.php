<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%request}}".
 *
 * @property int $id
 * @property string|null $status
 * @property int|null $user_id
 * @property int|null $request_clearance_level
 * @property string|null $request
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Users $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%request}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class, [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','request'], 'required'],
            [['user_id', 'request_clearance_level', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'string', 'max' => 20],
            [['request'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'request_clearance_level' => 'Request Clearance Level',
            'request' => 'Request',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RequestQuery(get_called_class());
    }
}
