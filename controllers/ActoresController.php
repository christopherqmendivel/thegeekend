<?php

namespace app\controllers;

use app\models\Actores;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActoresController implements the CRUD actions for Actores model.
 */
class ActoresController extends Controller
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
     * Lists all Actores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Actores::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idactores' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actores model.
     * @param int $idactores Idactores
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idactores)
    {
        return $this->render('view', [
            'model' => $this->findModel($idactores),
        ]);
    }

    /**
     * Creates a new Actores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Actores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idactores' => $model->idactores]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Actores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idactores Idactores
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idactores)
    {
        $model = $this->findModel($idactores);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idactores' => $model->idactores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Actores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idactores Idactores
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idactores)
    {
        $this->findModel($idactores)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Actores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idactores Idactores
     * @return Actores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idactores)
    {
        if (($model = Actores::findOne(['idactores' => $idactores])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
