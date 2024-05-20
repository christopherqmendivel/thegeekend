<?php

namespace app\controllers;

use app\models\Escenariosmusicales;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EscenariosmusicalesController implements the CRUD actions for Escenariosmusicales model.
 */
class EscenariosmusicalesController extends Controller
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
     * Lists all Escenariosmusicales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Escenariosmusicales::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idesmu' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Escenariosmusicales model.
     * @param int $idesmu Idesmu
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idesmu)
    {
        return $this->render('view', [
            'model' => $this->findModel($idesmu),
        ]);
    }

    /**
     * Creates a new Escenariosmusicales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Escenariosmusicales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idesmu' => $model->idesmu]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Escenariosmusicales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idesmu Idesmu
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idesmu)
    {
        $model = $this->findModel($idesmu);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idesmu' => $model->idesmu]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Escenariosmusicales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idesmu Idesmu
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idesmu)
    {
        $this->findModel($idesmu)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Escenariosmusicales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idesmu Idesmu
     * @return Escenariosmusicales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idesmu)
    {
        if (($model = Escenariosmusicales::findOne(['idesmu' => $idesmu])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
