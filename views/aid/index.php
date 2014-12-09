<?php

use yii\helpers\Html;
use app\models\User;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Bantuan Tersedia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::ADMIN) :?>
    <p>
        <?= Html::a('Tambah bantuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php elseif (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::RELAWAN) :?>
    <p>
        Bantuan tidak ada di daftar? <?= Html::a('Klik disini',['/demand/create','id'=>0]); ?>
    </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'label' => 'Jumlah',
                'value' => function($model) {
                    return $model->stock." ".$model->unit;
                }
            ],
            // [
            //     'label' => 'Kategori',
            //     'value' => function($model){
            //         return $model->category->name;
            //     }
            // ],
            [
                'label' => 'Aksi',
                'value' => function($model) {
                    return Html::a('minta',['/demand/create','aid_id'=>$model->id]);
                },
                'format' => 'html',
                'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::RELAWAN),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} | {update} | {delete}',
                'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->rules == User::ADMIN),
                'buttons' => 
                    [
                        'view' => function($url,$model,$key){
                            return Html::a('Lihat',$url);
                        },
                        'update' => function($url,$model,$key){
                            return Html::a('Ubah',$url);
                        },
                        'delete' => function($url,$model,$key){
                            return Html::a('Hapus',$url,['data'=>['method'=>'post','confirm'=>"Apakah anda ingin menghapus $model->name? "]]);
                        }
                    ]
                
                
            ],
        ],
    ]); ?>

</div>
<div id="dataConfirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h5 id="dataConfirmLabel">Konfirmasi Hapus</h5></div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <a class="btn btn-danger" id="dataConfirmOK">OK</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});
</script>