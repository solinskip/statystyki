<?php

namespace app\controllers;

use Yii;
use app\models\GridSettings;
use app\models\search\GridSettingsSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;

/**
 * GridSettingsController implements the CRUD actions for GridSettings model.
 */
class GridSettingsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'apply-filter', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'apply-filter', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GridSettings models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GridSettingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Create new grid settings
     *
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new GridSettings();

        if ($model->load(Yii::$app->request->post())) {
            $filter = array_filter(current(Yii::$app->request->get()));
            $model->user_id = Yii::$app->user->id;
            $model->settings = json_encode(['columns' => $model->columnsOn, 'filter' => $filter]);
            $model->created_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Szablon został dodany prawidłowo.');
            }

            return $this->redirect(Url::to(['site/index']));
        }

        return $this->renderAjax('_gridSave', [
            'model' => $model,
        ]);
    }

    /**
     * Applies selected filter on the main table
     *
     * @param $id integer
     * @return Response
     */
    public function actionApplyFilter($id)
    {
        $gridSettings = GridSettings::findOne($id);
        $filters = json_decode($gridSettings->settings, true);
        $query = isset($filters['filter']) ? '&' . http_build_query(['RealizacjaSearch' => $filters['filter']]) : '';

        return $this->redirect(Url::to(['site/index', 'templateId' => $id]) . $query);
    }

    /**
     * Delete model grid settings
     *
     * @param $id integer
     * @return array|Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', 'Szablon został usunięty prawidłowo.');
        }

        return $this->redirect(Url::to(['site/index']));
    }

    /**
     * Finds the GridSettings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GridSettings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GridSettings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}