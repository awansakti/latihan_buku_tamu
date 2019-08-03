<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
      //  'brandLabel' => Yii::$app->name,
      'brandLabel' =>'Sistem Informasi Buku Tamu',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels'=>false,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp; Beranda', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp; Tamu', 
                        'items' =>[ ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Input Data', 'url' => ['/tamu/create']],
                                   ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Tampil Data', 'url' => ['/tamu/index']],

                        ]
            ],
            ['label' => '<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;&nbsp; Kantor', 
                        'items' =>[ ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Input Data', 'url' => ['/kantor/create']],
                                 ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Tampil Data', 'url' => ['/kantor/index']],

                    ]
             ],
            ['label' => '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp; Keterangan', 
                         'items' =>[ 
                                        ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Input Data', 'url' => ['/keterangan/create']],
                                        ['label' => '<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp; Tampil Data', 'url' => ['/keterangan/index']],
                                   ]
            ],
          //  Yii::$app->user->isGuest ? (
            //   ['label' => 'Login', 'url' => ['/site/login']]
           // ) : (
            //    '<li>'
            //    . Html::beginForm(['/site/logout'], 'post')
            //    . Html::submitButton(
            //        'Logout (' . Yii::$app->user->identity->username . ')',
            //        ['class' => 'btn btn-link logout']
            //    )
            //    . Html::endForm()
           //     . '</li>'
           // )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Kejaksaan Negeri Minahasa <?= date('Y') ?></p>

      
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
