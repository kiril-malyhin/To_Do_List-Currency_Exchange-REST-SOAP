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


