<?php


namespace frontend\controllers;


use frontend\resource\Department;
use yii\rest\ActiveController;

class DepartmentController extends ActiveController
{
    public $modelClass = Department::class;
}