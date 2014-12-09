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
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
                            return Html::a('Hapus',$url,['data'=>['method'=>'post','confirm'=>"Apakah anda ingin menghapus $model->username? "]]);
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
