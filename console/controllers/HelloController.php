<?php
namespace console\controllers;
use yii\console\Controller;
use yii\helpers\Console;

class HelloController extends Controller
{
    public function actionHello()
    {
        Console::stdout('Executed At:'.date('Y-m-d H:i:s').PHP_EOL);
    }
}