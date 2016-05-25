<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;


class SiteController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTodo(){
        return $this->render('list');
    }

    public function actionCurrency(){
        return $this->render('exchange_currency');
    }

    public function actionGet_all_items(){

        $query= new Query();
        $items = $query->from('items')->select(['*'])->all();
        echo json_encode($items);
    }

    public function actionAdd_task(){
        $taskName=Yii::$app->request->post('taskName');
        $taskDescription=Yii::$app->request->post('taskDescription');
        $taskDate=Yii::$app->request->post('taskDate');

        $query= new Query();
        if($listInfo = $query->from('items')->where(['item_name'=>$taskName])->exists())
        {
            echo json_encode('bad');
        }
        else{

            Yii::$app->db->createCommand()
                ->insert('items',
                    ['item_name'=>$taskName,'item_description'=>$taskDescription, 'item_data_create'=>$taskDate])
                ->execute();
            echo json_encode('ok');
        }
    }

}
