<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DemandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permintaan Bantuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Demand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'aid_id',
            'amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
