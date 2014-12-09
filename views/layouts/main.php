<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'SIMBAT',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::ADMIN):
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left'],
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-th-list"></span> Daftar Pengguna', 'url' => ['/user/index']],
                        //['label' => '<span class="glyphicon glyphicon-user"></span> Tambah Pengguna', 'url' => ['/user/create']],
                        ['label' => '<span class="glyphicon glyphicon-briefcase"></span> Stok Bantuan', 'url' => ['/aid/index']],
                        ['label' => '<span class="glyphicon glyphicon-screenshot"></span> Lihat Kondisi', 'url' => ['/request/index']],
                    ],
                    'encodeLabels' => false
                ]);
            endif;

            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::RELAWAN):
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left'],
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-th-list"></span> Daftar Bantuan', 'url' => ['/aid/index']],
                        //['label' => '<span class="glyphicon glyphicon-question-sign"></span> Bantuan Tidak Terdaftar', 'url' => ['/aid/create']],
                    ],
                    'encodeLabels' => false
                ]);
            endif;

            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::PEMERINTAH):
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left'],
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-th-list"></span> Peta Distribusi', 'url' => ['/request/index',]],
                    ],
                    'encodeLabels' => false
                ]);
            endif;

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container" style='height:100%'>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container-fluid">
    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-bottom">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="navbar-text" href="#"><span id="currentDateTime"></span></p>
        </div>

        <div class="collapse navbar-collapse" id="navbar-bottom">
        </div>

    </div>
</nav>
<script type="text/javascript">
    var currentDateTime = document.getElementById('currentDateTime');
    function updateCurrentDateTime() {
        currentDateTime.innerHTML = new Date().toLocaleString();
    }
    updateCurrentDateTime();
    setInterval(updateCurrentDateTime, 1000);
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
