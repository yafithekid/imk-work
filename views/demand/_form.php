<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\app\assets\TimePickerAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Demand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeLabel($model,'aid_id'); ?><br>
    <?= (isset($model->aid))?"<h4>".$model->aid->name."</h4>":Html::activeTextInput($model,'new_aid',['class'=>'form-control']); ?>
    <br>
    <?= $form->field($model, 'date')->textInput(['id'=>'date']) ?>
    <?= Html::activeHiddenInput($model,'aid_id'); ?>

    <?php $woi = isset($model->aid)?$model->aid->name:''; ?>
    <?= $form->field($model, 'amount')->textInput(['template'=>"{label} (".$woi.")\n{input}\n{error}\n"]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
        $("#date").datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
        });
    </script>