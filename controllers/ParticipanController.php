<?php

namespace app\controllers;

use app\models\Participan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipanController implements the CRUD actions for Participan model.
 */
class ParticipanController extends Controller
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
     * Lists all Participan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Participan::find(),
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
     * Displays a single Participan model.
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
     * Creates a new Participan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Participan();

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
     * Updates an existing Participan model.
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
     * Deletes an existing Participan model.
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
     * Finds the Participan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idparticipan Idparticipan
     * @return Participan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idparticipan)
    {
        if (($model = Participan::findOne(['idparticipan' => $idparticipan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
