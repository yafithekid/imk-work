<?php

namespace app\controllers;

class RequestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDistribution(){
    	return $this->render('distribution');
    }

}
