<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="myApp">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-animate.js"></script>
<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.1.2.js"></script>
<script src="http://angular-ui.github.io/ui-router/release/angular-ui-router.js"></script>
<!--<link rel="stylesheet" href="../layouts/../../web/js/libs/FortAwesome-Font-Awesome-8e241f2/css/font-awesome.min.css">-->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
        <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
                'style'=> 'background-color: black; font-size: 15px',
            ],
        ]);
        ?>

       <?php NavBar::end();
    ?>

    <div class="containerContent">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

    <footer class="footer" style="background-color: black;">
        <div class="containerContent">
            <p class="pull-left" style="padding-left: 10px">&copy; Test <?= date('Y') ?></p>
            <p style="padding-right: 60px">Made by Kirill Malyhin</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


