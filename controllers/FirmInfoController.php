<?php

namespace app\controllers;

use Yii;
use app\models\FirmInfo;
use app\models\FirmInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\SericalColumn;
use yii\grid\ActionColumn;

/**
 * FirmInfoController implements the CRUD actions for FirmInfo model.
 */
class FirmInfoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all FirmInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FirmInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 //       $serClass = SericalColumn::ClassName();
 //       $actClm = ActionColumn::className();
        return $this->render('index.twig', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'serClass' =>$serClass, 'actClass'=>$actClm,
        ]);
    }

    /**
     * Displays a single FirmInfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FirmInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FirmInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FIRM_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FirmInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FIRM_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FirmInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FirmInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FirmInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FirmInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGriddataService()
    {
        $data = [];
        if (\Yii::$app->request->isAjax) {
            if (isset($_GET['searchString'])) {
                //using filtering
                //            $searchField=$_GET['name_startsWith'];
                $isp = FirmInfo::find()
                    ->where(['LIKE', 'F_NAME', $_GET['searchString']])
                    ->all();
            } else {
                $isp = FirmInfo::find()
                    ->orderBy(['FIRM_ID' => SORT_DESC])
                    ->all();
            }
            // deal with the data  F_NAME, F_TYPE, REF_F_ID, EMAIL_DOMAIN, RECOM_FLAG, PRINT_FLAG
            foreach ($isp as $row) {
                //got the related firm's name
                $tmpAr = [];
                $fcode = $row->REF_F_ID;
                $RetFirm = FirmInfo::findOne(['FIRM_ID' => $fcode]);
                $tmpAr['F_NAME'] = $row->F_NAME;
                switch ($row->F_TYPE) {
                    case 1:
                        $typeName = '一般型';
                        break;
                    case 2:
                        $typeName = '員工型';
                        break;
                    case 3:
                        $typeName = 'E-mail 驗證型';
                        break;
                }
                $tmpAr['F_TYPE'] = $typeName;
                $tmpAr['REF_F_ID'] = $RetFirm ? $RetFirm->F_NAME : '';
                $tmpAr['EMAIL_DOMAIN'] = $row->EMAIL_DOMAIN;
                if ($row->RECOM_FLAG)
                    $tmpAr['RECOM_FLAG'] = '是';
                else {
                    $tmpAr['RECOM_FLAG'] = '否';
                }
                if ($row->PRINT_FLAG) {
                    $tmpAr['PRINT_FLAG'] = '是';
                } else {
                    $tmpAr['PRINT_FLAG'] = '否';
                }
                $tmpAr['FIRM_ID'] = $row->FIRM_ID;
                if ($row->STATUS) {
                    $tmpAr['STATUS'] = '啟用';
                } else {
                    $tmpAr['STATUS'] = '停用';
                }
                array_push($data, $tmpAr);
            }
            $response = \Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            $response->data = $data;
            return $response;
        } else {
            return [];
        }
    }

}
