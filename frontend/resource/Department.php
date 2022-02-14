<?php


namespace frontend\resource;


class Department extends \common\models\Department
{
    public function fields()
    {
        return ['id', 'dept_name'];
    }

}