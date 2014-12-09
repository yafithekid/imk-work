<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'username',
            'name',
            'rules',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} | {update} | {delete} ',
                'buttons' => 
                    [
                        'view' => function($url,$model,$key){
                            return Html::a('Lihat',$url);
                        },
                        'update' => function($url,$model,$key){
                            return Html::a('Ubah',$url);
                        },
                        'delete' => function($url,$model,$key){
                            return Html::a('Hapus',$url);
                        }
                    ]
                
                
            ],
        ],
    ]); ?>

</div>
