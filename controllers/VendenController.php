<?php

namespace app\controllers;

use app\models\Venden;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendenController implements the CRUD actions for Venden model.
 */
class VendenController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Venden models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Venden::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idvenden' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venden model.
     * @param int $idvenden Idvenden
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idvenden)
    {
        return $this->render('view', [
            'model' => $this->findModel($idvenden),
        ]);
    }

    /**
     * Creates a new Venden model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Venden();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idvenden' => $model->idvenden]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Venden model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idvenden Idvenden
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idvenden)
    {
        $model = $this->findModel($idvenden);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idvenden' => $model->idvenden]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venden model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idvenden Idvenden
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idvenden)
    {
        $this->findModel($idvenden)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venden model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idvenden Idvenden
     * @return Venden the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idvenden)
    {
        if (($model = Venden::findOne(['idvenden' => $idvenden])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
