<?php


namespace frontend\controllers;


use common\models\Department;
use yii\rest\ActiveController;

class DepartmentController extends ActiveController
{
    public $modelClass = Department::class;
}