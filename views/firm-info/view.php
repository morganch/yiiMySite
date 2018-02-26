<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FirmInfo */

$this->title = $model->FIRM_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firm Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firm-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->FIRM_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->FIRM_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'FIRM_ID',
            'F_CODE',
            'F_NAME',
            'F_TYPE',
            'REF_F_ID',
            'EMAIL_DOMAIN:email',
            'RECOM_FLAG:boolean',
            'PRINT_FLAG:boolean',
            'LOGO_IMAGE',
            'EMAIL_VAL_URL:email',
            'ACTIVITE:boolean',
            'CREATE_USER',
            'CREATE_DATE',
            'UPDATE_USER',
            'UPDATE_DATE',
            'STATUS:boolean',
            'JUIKER_MBR',
        ],
    ]) ?>

</div>
