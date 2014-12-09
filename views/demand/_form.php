<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\app\assets\TimePickerAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Demand */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKKdHe2kfdhW4NXkLoIwFkLw0HOvKibc0"></script>
<div class="demand-form col-xs-5">
	<br/>
    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model,'aid_id'); ?><br>
    <?= (isset($model->aid))?"<h4>".$model->aid->name."</h4>":Html::activeTextInput($model,'new_aid',['class'=>'form-control']); ?>
    <br>
    <?= $form->field($model, 'date')->textInput(['id'=>'date']) ?>
    <?= Html::activeHiddenInput($model,'aid_id'); ?>

    <?php $woi = isset($model->aid)?$model->aid->name:''; ?>
    <?= $form->field($model, 'amount')->textInput(['template'=>"{label} (".$woi.")\n{input}\n{error}\n"]) ?>

    
    <div style="clear:both;"></div><br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Minta Bantuan' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<div class='col-xs-5'>
    <b>Lokasi</b><br/>
    <div id='map-canvas' style="height:300px;"></div>
</div>
<script type="text/javascript">
    var lat =-6.8933215;
    var lng = 107.6115761;
    var mapOptions = {
            center: new google.maps.LatLng(lat,lng),
            zoom: 15
       };
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        mapOptions
    );
    var marker = new google.maps.Marker({
        draggable: true,
        title: 'Start',
        map: map,
    });
    marker.setPosition(new google.maps.LatLng(lat,lng));
</script>
<script type="text/javascript">
        $("#date").datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
        });
    </script>