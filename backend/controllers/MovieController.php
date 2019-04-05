<?php

namespace backend\controllers;

class MovieController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetMovie()
    {
        Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $movie = Movie::find()->all();
        return 'data'=> $movie;
    }

}
