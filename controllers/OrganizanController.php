<?php

namespace app\controllers;

use app\models\Organizan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizanController implements the CRUD actions for Organizan model.
 */
class OrganizanController extends Controller
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
     * Lists all Organizan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Organizan::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idparticipan' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organizan model.
     * @param int $idparticipan Idparticipan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idparticipan)
    {
        return $this->render('view', [
            'model' => $this->findModel($idparticipan),
        ]);
    }

    /**
     * Creates a new Organizan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Organizan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idparticipan' => $model->idparticipan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Organizan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idparticipan Idparticipan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idparticipan)
    {
        $model = $this->findModel($idparticipan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idparticipan' => $model->idparticipan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Organizan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idparticipan Idparticipan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idparticipan)
    {
        $this->findModel($idparticipan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Organizan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idparticipan Idparticipan
     * @return Organizan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idparticipan)
    {
        if (($model = Organizan::findOne(['idparticipan' => $idparticipan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
