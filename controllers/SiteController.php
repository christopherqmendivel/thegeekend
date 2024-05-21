<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Participan;
use app\models\Torneos;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail('thegeekend24@gmail.com')) {
                Yii::$app->session->setFlash('contactFormSubmitted');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionTorneosadmin()
    {
        return $this->render('torneosadmin');
    }
    
    public function actionJugadoresportorneo()
    {
        $participaciones = Participan::find()
            ->select(['idtorneos', 'COUNT(idjugadores) AS cantidad'])
            ->groupBy('idtorneos')
            ->asArray()
            ->all();
        
        $labels = [];
        foreach ($participaciones as $participacion) {
        // Obtener el nombre del torneo basado en su idtorneo
        $torneo = Torneos::findOne($participacion['idtorneos']);
            if ($torneo) {
                // Agrega el nombre del torneo al array de etiquetas
                $labels[] = $torneo->juego;
            } else {
                $labels[] = "Torneo Desconocido"; // Si el torneo no se encuentra en la tabla torneo
            }
        }
        
        return $this->render('jugadoresportorneo', [
            'participaciones' => $participaciones,
             'labels' => $labels, // Pasar los nombres de los torneos a la vista
        ]);
    }
    
    public function actionPrivacity()
    {
        return $this->render('privacity');
    }
}
