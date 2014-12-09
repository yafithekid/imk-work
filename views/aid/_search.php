<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\AidSearch */
/* @var $form yii\widgets\ActiveForm */
$categories = ArrayHelper::map(Category::find()->all(),'id','name');
array_merge($categories,[''=>'Semua']);
?>

<div class="aid-search col-xs-6 col-xs-offset-6">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>

    <div class='col-xs-4'><?= Html::activeTextInput($model,'name',['class'=>'form-control','placeholder'=>'cari bantuan...']);?></div>
    <div class='col-xs-4'><?= Html::activeDropDownList($model,'category_id',$categories,['class'=>'form-control']);?></div>
    <div class='col-xs-4'><div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div></div>
    

    

    <?php ActiveForm::end(); ?>

</div>
