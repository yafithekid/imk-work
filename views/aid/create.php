<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aid */

$this->title = 'Tambah Bantuan';
$this->params['breadcrumbs'][] = ['label' => 'Bantuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
