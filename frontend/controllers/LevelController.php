<?php


namespace frontend\controllers;


use common\models\Level;
use yii\rest\ActiveController;

class LevelController extends ActiveController
{
    public $modelClass = Level::class;
}