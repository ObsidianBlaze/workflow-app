<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Request]].
 *
 * @see \common\models\Request
 */
class RequestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
