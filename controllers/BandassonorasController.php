<?php

namespace app\controllers;

use app\models\Bandassonoras;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BandassonorasController implements the CRUD actions for Bandassonoras model.
 */
class BandassonorasController extends Controller
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
     * Lists all Bandassonoras models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Bandassonoras::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idbs' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bandassonoras model.
     * @param int $idbs Idbs
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idbs)
    {
        return $this->render('view', [
            'model' => $this->findModel($idbs),
        ]);
    }

    /**
     * Creates a new Bandassonoras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bandassonoras();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idbs' => $model->idbs]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bandassonoras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idbs Idbs
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idbs)
    {
        $model = $this->findModel($idbs);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idbs' => $model->idbs]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bandassonoras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idbs Idbs
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idbs)
    {
        $this->findModel($idbs)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bandassonoras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idbs Idbs
     * @return Bandassonoras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idbs)
    {
        if (($model = Bandassonoras::findOne(['idbs' => $idbs])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
