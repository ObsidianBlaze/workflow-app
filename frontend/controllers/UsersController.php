<?php


namespace frontend\controllers;


use common\models\Users;
use yii\rest\ActiveController;

class UsersController extends ActiveController
{
    public $modelClass = Users::class;
}