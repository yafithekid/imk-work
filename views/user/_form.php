<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form col-xs-12">
<div class='col-xs-4 col-xs-offset-4'>
    <?php $form = ActiveForm::begin(); ?>

    <!-- <span class='glyphicon glyphicon-lock'></span> -->
    <?= $form->field($model, 'username'/*,['template'=>"{input}\n{error}"]*/)->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 500]) ?>
    
    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 500]) ?>
     
    <?= $form->field($model, 'name')->textInput(['maxlength' => 500]) ?>


    <?= $form->field($model, 'rules')->dropDownList([ 'admin' => 'Admin', 'pemerintah' => 'Pemerintah', 'relawan' => 'Relawan', ], ['prompt' => '']) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
<!--
<div class="user-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => true]); ?>
    <div class='input-group'>
    	<span class='input-group-addon'>
    		<span class='glyphicon glyphicon-user'></span>
    	</span>
    	<?= Html::activeTextInput($model,'username',['class'=>'form-control','placeholder'=>'username']); ?>
    </div>

    <div class='input-group'>
    	<span class="input-group-addon"><span class='glyphicon glyphicon-lock'></span></span>
    	<?= Html::activePasswordInput($model,'password',['class'=>'form-control','placeholder'=>'password']); ?>
    </div>


    <div class='input-group'>
    	<span class="input-group-addon"><span class='glyphicon glyphicon-lock'></span></span>
    	<?= Html::activePasswordInput($model,'password',['class'=>'form-control','placeholder'=>'password']); ?>
    </div>

    <div class='input-group'>
    	<span class="input-group-addon"><span class='glyphicon glyphicon-tag'></span></span>
    	<?= Html::activeTextInput($model,'name',['class'=>'form-control','placeholder'=>'nama']); ?>
    </div>

    <div class='input-group'>
    	<span class="input-group-addon"><span class='glyphicon glyphicon-list'></span></span>
    	<?= Html::activeDropDownList($model,'name',[ 'admin' => 'Admin', 'pemerintah' => 'Pemerintah', 'relawan' => 'Relawan', ],['class'=>'form-control','placeholder'=>'peran']); ?>
    </div>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div> -->
