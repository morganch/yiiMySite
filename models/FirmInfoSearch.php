<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FirmInfo;

/**
 * FirmInfoSearch represents the model behind the search form about `app\models\FirmInfo`.
 */
class FirmInfoSearch extends FirmInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIRM_ID', 'F_TYPE', 'REF_F_ID', 'CREATE_USER', 'UPDATE_USER'], 'integer'],
            [['F_CODE', 'F_NAME', 'EMAIL_DOMAIN', 'LOGO_IMAGE', 'EMAIL_VAL_URL', 'CREATE_DATE', 'UPDATE_DATE'], 'safe'],
            [['RECOM_FLAG', 'PRINT_FLAG', 'ACTIVITE', 'STATUS'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = FirmInfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'FIRM_ID' => $this->FIRM_ID,
            'F_TYPE' => $this->F_TYPE,
            'REF_F_ID' => $this->REF_F_ID,
            'RECOM_FLAG' => $this->RECOM_FLAG,
            'PRINT_FLAG' => $this->PRINT_FLAG,
            'ACTIVITE' => $this->ACTIVITE,
            'CREATE_USER' => $this->CREATE_USER,
            'CREATE_DATE' => $this->CREATE_DATE,
            'UPDATE_USER' => $this->UPDATE_USER,
            'UPDATE_DATE' => $this->UPDATE_DATE,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'F_CODE', $this->F_CODE])
            ->andFilterWhere(['like', 'F_NAME', $this->F_NAME])
            ->andFilterWhere(['like', 'EMAIL_DOMAIN', $this->EMAIL_DOMAIN])
            ->andFilterWhere(['like', 'LOGO_IMAGE', $this->LOGO_IMAGE])
            ->andFilterWhere(['like', 'EMAIL_VAL_URL', $this->EMAIL_VAL_URL]);

        return $dataProvider;
    }
}
