<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "firm_info".
 *
 * @property integer $FIRM_ID
 * @property string $F_CODE
 * @property string $F_NAME
 * @property integer $F_TYPE
 * @property integer $REF_F_ID
 * @property string $EMAIL_DOMAIN
 * @property boolean $RECOM_FLAG
 * @property boolean $PRINT_FLAG
 * @property string $LOGO_IMAGE
 * @property string $EMAIL_VAL_URL
 * @property boolean $ACTIVITE
 * @property integer $CREATE_USER
 * @property string $CREATE_DATE
 * @property integer $UPDATE_USER
 * @property string $UPDATE_DATE
 * @property boolean $STATUS
 * @property integer $JUIKER_MBR
 */
class FirmInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firm_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIRM_ID', 'F_TYPE', 'REF_F_ID', 'CREATE_USER', 'CREATE_DATE'], 'required'],
            [['FIRM_ID', 'F_TYPE', 'REF_F_ID', 'CREATE_USER', 'UPDATE_USER'], 'integer'],
            [['RECOM_FLAG', 'PRINT_FLAG', 'ACTIVITE', 'STATUS'], 'boolean'],
            [['CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['F_CODE'], 'string', 'max' => 50],
            [['F_NAME', 'EMAIL_DOMAIN', 'LOGO_IMAGE', 'EMAIL_VAL_URL'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FIRM_ID' => Yii::t('app', '企業ID流水號'),
            'F_CODE' => Yii::t('app', '企業單號'),
            'F_NAME' => Yii::t('app', '企業名稱'),
            'F_TYPE' => Yii::t('app', '企業申請類型'),
            'REF_F_ID' => Yii::t('app', '群首企業'),
            'EMAIL_DOMAIN' => Yii::t('app', 'Email認證網域'),
            'RECOM_FLAG' => Yii::t('app', '可推薦'),
            'PRINT_FLAG' => Yii::t('app', '是否允許列印'),
            'LOGO_IMAGE' => Yii::t('app', '企業LOGO圖檔路徑'),
            'ufile' => Yii::t('app', '企業標誌'),
            'EMAIL_VAL_URL' => Yii::t('app', '內網嵌入網址'),
            'ACTIVITE' => Yii::t('app', '啟用MVPN'),
            'CREATE_USER' => Yii::t('app', '建立使用者ID'),
            'CREATE_DATE' => Yii::t('app', '建立時間'),
            'UPDATE_USER' => Yii::t('app', '更新使用者ID'),
            'UPDATE_DATE' => Yii::t('app', '更新時間'),
            'STATUS' => Yii::t('app', '狀態'),
        ];
    }
}
