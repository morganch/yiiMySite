<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FirmInfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Firm Info',
]) . ' ' . $model->FIRM_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firm Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FIRM_ID, 'url' => ['view', 'id' => $model->FIRM_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="firm-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
