<?php

namespace frontend\controllers;
use Yii;
use app\models\Movie;
use app\models\Director;
use app\models\Category;

class MovieController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $moviedata= Movie::find()->all();
        $category= Category::find()->all();
        $director= Director::find()->all();
        foreach ($moviedata as $movie) 
        {
            $movie->director_id=Director::find()->select('name')->where(['id'=>$movie->director_id])->one()->name;
            $movie->category_id= Category::find()->select('title')->where(['id'=>$movie->category_id])->one()->title;
        }
        return $this->render('index',[
            'director'=>$director,
            'moviedata'=>$moviedata,
            'category'=>$category,
        ]);
    }

    public function actionGetMovie()
    {
        Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $movie = Movie::find()->all();
        return  $movie;
    }

    public function actionGetDirector()
    {
        
        $director = Movie::getDirector();
        return  $director;
    }

}
