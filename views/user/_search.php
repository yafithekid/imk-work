<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search col-xs-offset-6">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class='col-xs-4'>
     <?= Html::activeTextInput($model,'name',['class'=>'form-control','placeholder'=>'cari nama...']);  ?>
    </div>
    <div class='col-xs-4'>
     <?= Html::activeDropDownList($model,'rules',[''=>'Semua peran', 'admin' => 'Admin', 'pemerintah' => 'Pemerintah', 'relawan' => 'Relawan', ],['class'=>'form-control']); ?>
    </div>
   
   
    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
