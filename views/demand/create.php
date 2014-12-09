<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Demand */

$this->title = 'Minta Bantuan';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Permintaan Bantuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>