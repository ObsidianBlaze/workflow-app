<?php


namespace frontend\controllers;


use frontend\resource\Users;
use yii\rest\ActiveController;

class UsersController extends ActiveController
{
    public $modelClass = Users::class;
}