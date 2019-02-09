<?php

namespace app\controllers;

use app\models\Realizacja;
use app\models\search\RealizacjaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Signup;
use app\models\Login;
use app\models\search\ProwadzacySearch;

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
                        'actions' => ['signup', 'logout'],
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
 * Displays homepage.
 *
 * @return string
 */
    public function actionIndex()
    {
        $searchModel = new RealizacjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Signup model.
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new Signup();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                Yii::$app->session->setFlash('success', 'Rejestracja przebiegła pomyślnie');

                return $this->redirect(Yii::$app->request->baseUrl . '/index.php' . '/site/index');
            }
        }

        return $this->renderAjax('signup', [
            'model' => $model,
        ]);
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

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->renderAjax('login', [
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
     * @param $model
     * @return array|bool
     */
    public function actionValidateForm($model)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if ($model) {
            $model = new $model;
            $model->load(Yii::$app->request->post());

            return \kartik\form\ActiveForm::validate($model);
        } else {

            return false;
        }
    }
}
