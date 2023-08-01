<?php

namespace backend\controllers;

use backend\models\MessageTiket;
use Yii;
use backend\models\Tikets;
use backend\models\TiketsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TiketsController implements the CRUD actions for Tikets model.
 */
class TiketsController extends BehaviorsController
{

    /**
     * Lists all Tikets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TiketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tikets model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tikets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tikets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tikets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tikets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTiketsHelp()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $p = $_POST;
        if (!empty($p['message']) && !empty($p['user_id']) && !empty($p['tiket_id']) && !empty($p['hash'])) {
            $hash = $p['hash'];
            $newHash = md5("{$p['user_id']}::{$p['tiket_id']}::special_hash_to_prevent_hack::9mb21z");
            if ($hash !== $newHash)
                return ['status' => 'error', 'message' => 'Ошибка контрольной суммы'];
            else {
                $msg = new MessageTiket();
                $msg->user_id = $p['user_id'];
                $msg->tiket_id = $p['tiket_id'];
                $msg->message = $p['message'];
                $msg->isSupport = 1;
                $msg->save();
                return ['status' => 'success'];
            }
        } else
            return ['status' => 'error', 'message' => 'Пустое сообщение или не задан ключевой параметр'];
    }

    public function actionChat($id)
    {
        return $this->render('chat', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Tikets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tikets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tikets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
