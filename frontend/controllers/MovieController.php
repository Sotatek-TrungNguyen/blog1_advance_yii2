<?php

namespace frontend\controllers;
use Yii;
use app\models\Movie;

class MovieController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $moviedata= $movie = Movie::find()->all();
        return $this->render('index',[
            'moviedata'=>$moviedata,
        ]);
    }

    public function actionGetMovie()
    {
        Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $movie = Movie::find()->all();
        return  $movie;
    }

}
