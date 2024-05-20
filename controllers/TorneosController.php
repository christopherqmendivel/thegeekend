<?php

namespace app\controllers;

use app\models\Torneos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TorneosController implements the CRUD actions for Torneos model.
 */
class TorneosController extends Controller
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
     * Lists all Torneos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Torneos::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idtorneos' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Torneos model.
     * @param int $idtorneos Idtorneos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtorneos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtorneos),
        ]);
    }

    /**
     * Creates a new Torneos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Torneos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtorneos' => $model->idtorneos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Torneos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtorneos Idtorneos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtorneos)
    {
        $model = $this->findModel($idtorneos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtorneos' => $model->idtorneos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Torneos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtorneos Idtorneos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtorneos)
    {
        $this->findModel($idtorneos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Torneos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtorneos Idtorneos
     * @return Torneos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtorneos)
    {
        if (($model = Torneos::findOne(['idtorneos' => $idtorneos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
