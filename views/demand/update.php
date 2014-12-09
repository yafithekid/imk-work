<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Demand */

$this->title = 'Ubah Permintaan Bantuan' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Permintaan Bantuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
