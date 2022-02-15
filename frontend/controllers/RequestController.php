<?php


namespace frontend\controllers;


use frontend\resource\Request;
use yii\rest\ActiveController;

class RequestController extends ActiveController
{
    public $modelClass = Request::class;
}