<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FirmInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firm-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FIRM_ID') ?>

    <?= $form->field($model, 'F_CODE') ?>

    <?= $form->field($model, 'F_NAME') ?>

    <?= $form->field($model, 'F_TYPE') ?>

    <?= $form->field($model, 'REF_F_ID') ?>

    <?php // echo $form->field($model, 'EMAIL_DOMAIN') ?>

    <?php // echo $form->field($model, 'RECOM_FLAG')->checkbox() ?>

    <?php // echo $form->field($model, 'PRINT_FLAG')->checkbox() ?>

    <?php // echo $form->field($model, 'LOGO_IMAGE') ?>

    <?php // echo $form->field($model, 'EMAIL_VAL_URL') ?>

    <?php // echo $form->field($model, 'ACTIVITE')->checkbox() ?>

    <?php // echo $form->field($model, 'CREATE_USER') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'UPDATE_USER') ?>

    <?php // echo $form->field($model, 'UPDATE_DATE') ?>

    <?php // echo $form->field($model, 'STATUS')->checkbox() ?>

    <?php // echo $form->field($model, 'JUIKER_MBR') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
