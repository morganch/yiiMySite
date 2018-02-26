<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FirmInfo */

$this->title = Yii::t('app', 'Create Firm Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Firm Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firm-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
