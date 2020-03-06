<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'change-type' => ['post']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
