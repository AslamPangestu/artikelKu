<?php

namespace backend\controllers;

use Yii;
use common\models\Artikel;
use common\models\ArtikelSearch;
use common\models\Kategori;
use common\models\User;
use common\components\AccessRule;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ArtikelController implements the CRUD actions for Artikel model.
 */
class ArtikelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                [
                    'actions' => ['index', 'create', 'update',
                    'delete','view'],
                    'allow' => true,
                    'roles' => ['@'],
                  ],
                ],
              ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Artikel models.
     * @return mixed
     */
    public function actionIndex()
    {
      $dataProvider = new ActiveDataProvider([
          'query' => Artikel::find(),
              'sort' => [
                  'defaultOrder' => [
                      'id_artikel' => SORT_DESC
                  ]
              ]
          ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artikel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Artikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Artikel();
      if ($model->load(Yii::$app->request->post())) {
        $image = UploadedFile::getInstance($model, 'image');
         if (!is_null($image)) {
           $model->image_src_filename = $image->name;
           $tmp = (explode(".", $image->name));
           $ext = end($tmp);
            // generate a unique file name to prevent duplicate filenames
            $model->image_web_filename = Yii::$app->security->generateRandomString().".{$ext}";
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
            $path = Yii::$app->params['uploadPath'] . $model->image_web_filename;
             $image->saveAs($path);
          }
          if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_artikel]);
          }else {
                var_dump ($model->getErrors()); die();
          }
      } else {
          return $this->render('create', ['model' => $model,]);
      }
    }

    /**
     * Updates an existing Artikel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Artikel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
