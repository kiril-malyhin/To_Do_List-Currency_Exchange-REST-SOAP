<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class TodoController extends Controller{

    public function actionOpen(){
        return $this->render("to_do_list");
    }
}

