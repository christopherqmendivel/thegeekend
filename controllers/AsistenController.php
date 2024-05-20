<?php

namespace app\controllers;

use app\models\Asisten;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsistenController implements the CRUD actions for Asisten model.
 */
class AsistenController extends Controller
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
     * Lists all Asisten models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Asisten::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idasisten' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asisten model.
     * @param int $idasisten Idasisten
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idasisten)
    {
        return $this->render('view', [
            'model' => $this->findModel($idasisten),
        ]);
    }

    /**
     * Creates a new Asisten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Asisten();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idasisten' => $model->idasisten]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asisten model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idasisten Idasisten
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idasisten)
    {
        $model = $this->findModel($idasisten);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idasisten' => $model->idasisten]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asisten model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idasisten Idasisten
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idasisten)
    {
        $this->findModel($idasisten)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asisten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idasisten Idasisten
     * @return Asisten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idasisten)
    {
        if (($model = Asisten::findOne(['idasisten' => $idasisten])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
