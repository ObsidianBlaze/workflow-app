<?php


namespace frontend\controllers;


use frontend\resource\Level;
use yii\rest\ActiveController;

class LevelController extends ActiveController
{
    public $modelClass = Level::class;
}