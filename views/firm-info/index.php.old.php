<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Firm Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firm-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Firm Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FIRM_ID',
            'F_CODE',
            'F_NAME',
            'F_TYPE',
            'REF_F_ID',
            // 'EMAIL_DOMAIN:email',
            // 'RECOM_FLAG:boolean',
            // 'PRINT_FLAG:boolean',
            // 'LOGO_IMAGE',
            // 'EMAIL_VAL_URL:email',
            // 'ACTIVITE:boolean',
            // 'CREATE_USER',
            // 'CREATE_DATE',
            // 'UPDATE_USER',
            // 'UPDATE_DATE',
            // 'STATUS:boolean',
            // 'JUIKER_MBR',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
