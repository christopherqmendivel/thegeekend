<?php
namespace app\controllers;

use app\models\Jugadores;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * JugadoresController implements the CRUD actions for Jugadores model.
 */
class JugadoresController extends Controller
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
     * Lists all Jugadores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Jugadores::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idjugadores' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jugadores model.
     * @param int $idjugadores Idjugadores
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idjugadores)
    {
        return $this->render('view', [
            'model' => $this->findModel($idjugadores),
        ]);
    }

    /**
     * Creates a new Jugadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Jugadores();

        if ($model->load(Yii::$app->request->post())) {
            // Si prefieres guardar la contraseña en texto plano:
            // $model->password = $model->password;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->idjugadores]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jugadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idjugadores Idjugadores
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idjugadores)
    {
        $model = $this->findModel($idjugadores);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idjugadores' => $model->idjugadores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jugadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idjugadores Idjugadores
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idjugadores)
    {
        $this->findModel($idjugadores)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jugadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idjugadores Idjugadores
     * @return Jugadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idjugadores)
    {
        if (($model = Jugadores::findOne(['idjugadores' => $idjugadores])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

