<?php


namespace frontend\controllers;


use common\models\Request;
use yii\rest\ActiveController;

class RequestController extends ActiveController
{
    public $modelClass = Request::class;
}