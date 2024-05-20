<?php

namespace app\controllers;

use app\models\Telefonosactores;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TelefonosactoresController implements the CRUD actions for Telefonosactores model.
 */
class TelefonosactoresController extends Controller
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
     * Lists all Telefonosactores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Telefonosactores::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idtelefono' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Telefonosactores model.
     * @param int $idtelefono Idtelefono
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtelefono)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtelefono),
        ]);
    }

    /**
     * Creates a new Telefonosactores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Telefonosactores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtelefono' => $model->idtelefono]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Telefonosactores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtelefono Idtelefono
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtelefono)
    {
        $model = $this->findModel($idtelefono);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtelefono' => $model->idtelefono]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Telefonosactores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtelefono Idtelefono
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtelefono)
    {
        $this->findModel($idtelefono)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Telefonosactores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtelefono Idtelefono
     * @return Telefonosactores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtelefono)
    {
        if (($model = Telefonosactores::findOne(['idtelefono' => $idtelefono])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
