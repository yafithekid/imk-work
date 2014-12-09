<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Demand */

$this->title = "Permintaan telah dikirim";
$this->params['breadcrumbs'][] = ['label' => 'Daftar Permintaan Bantuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demand-view col-xs-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'label' => 'Lokasi',
                'value' => 'Bandung',
            ],
            'date',
            [
                'label' => 'Jenis Bantuan',
                'value' => $model->aid->name,
            ],
            //'aid_id',
            'amount',
        ],
    ]) ?>

</div>
