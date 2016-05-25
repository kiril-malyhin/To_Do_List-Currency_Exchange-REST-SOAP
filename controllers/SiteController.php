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

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChange_password(){

        $old_password=Yii::$app->request->post('password');
        $new_password=Yii::$app->request->post('new_password');

        $query= new Query();
        if($userInfo = $query->from('user')->where(['userId'=>Yii::$app->user->id, 'password'=>sha1($old_password)])->exists())
        {
            Yii::$app->db->createCommand()
                ->update('user',
                    ['password'=>sha1($new_password)],['userId'=>Yii::$app->user->id])
                ->execute();
            echo json_encode('ok');
        }
        else{
            echo json_encode('bad');
        }
    }

    public function actionRestore_password(){
        $password=Yii::$app->request->post('password');
        $name = Yii::$app->request->post('userName');

        $query= new Query();
        if($userInfo = $query->from('user')->where(['email'=>$name])->exists())
        {
            Yii::$app->db->createCommand()
                ->update('user',
                    ['password'=>sha1($password)],['email'=>$name])
                ->execute();
            echo json_encode('ok');
        }
        else{
            echo json_encode('bad');
        }
    }

    public function actionContact_us(){

        $myemail = 'kiril.malyhin@yandex.ru';

        $name = Yii::$app->request->post('first_name');
        $email_address = Yii::$app->request->post('email');
        $message = Yii::$app->request->post('comments');
        $company = Yii::$app->request->post('company');
        $phone = Yii::$app->request->post('phone');

            $to = $myemail;

            $email_subject = "Contact form submission: $name";

            $email_body = "You have received a new message. ".

                " Here are the details:\n Name: $name \n ".

                "Company: $company\n Email: $email_address\n".

                "Phone: $phone\n Message: \n $message";

            $headers = "From: $myemail\n";

            $headers .= "Reply-To: $email_address";

            mail($to,$email_subject,$email_body,$headers);

            echo json_encode('ok');

    }

    public function actionRestore(){
        return $this->render('restorePassword');
    }



}
