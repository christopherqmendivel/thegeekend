<?php

namespace app\controllers;

use app\models\Coleccionables;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColeccionablesController implements the CRUD actions for Coleccionables model.
 */
class ColeccionablesController extends Controller
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
     * Lists all Coleccionables models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Coleccionables::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idcolecc' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coleccionables model.
     * @param int $idcolecc Idcolecc
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcolecc)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcolecc),
        ]);
    }

    /**
     * Creates a new Coleccionables model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Coleccionables();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idcolecc' => $model->idcolecc]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Coleccionables model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcolecc Idcolecc
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcolecc)
    {
        $model = $this->findModel($idcolecc);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcolecc' => $model->idcolecc]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Coleccionables model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcolecc Idcolecc
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcolecc)
    {
        $this->findModel($idcolecc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coleccionables model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcolecc Idcolecc
     * @return Coleccionables the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcolecc)
    {
        if (($model = Coleccionables::findOne(['idcolecc' => $idcolecc])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
