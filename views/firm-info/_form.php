<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FirmInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firm-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FIRM_ID')->textInput() ?>

    <?= $form->field($model, 'F_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_TYPE')->textInput() ?>

    <?= $form->field($model, 'REF_F_ID')->textInput() ?>

    <?= $form->field($model, 'EMAIL_DOMAIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RECOM_FLAG')->checkbox() ?>

    <?= $form->field($model, 'PRINT_FLAG')->checkbox() ?>

    <?= $form->field($model, 'LOGO_IMAGE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL_VAL_URL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACTIVITE')->checkbox() ?>

    <?= $form->field($model, 'CREATE_USER')->textInput() ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput() ?>

    <?= $form->field($model, 'UPDATE_USER')->textInput() ?>

    <?= $form->field($model, 'UPDATE_DATE')->textInput() ?>

    <?= $form->field($model, 'STATUS')->checkbox() ?>

    <?= $form->field($model, 'JUIKER_MBR')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
