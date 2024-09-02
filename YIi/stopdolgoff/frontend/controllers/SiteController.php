<?php

namespace frontend\controllers;

use app\models\Articles;
use app\models\Partners;
use app\models\Services;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actionIndex()
    {
        $months = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];
        $partners = Partners::find()->all();
        $services = Services::find()
            ->limit(2)
            ->all();
        $articles = Articles::find()
            ->limit(2)
            ->all();
        return $this->render('index', [
            'partners' => $partners,
            'articles' => $articles,
            'months' => $months,
            'services' => $services,
        ]);
    }

    public function actionService()
    {
        $services = Services::find()->all();
        return $this->render('service', [
            'services' => $services,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionArticle()
    {
        $months = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];
        $query = Articles::find();
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
        $articles = $query->orderBy('date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('article', [
            'articles' => $articles,
            'pagination' => $pagination,
            'months' => $months,
        ]);
    }

    public function actionArticleSearch()
    {
        $months = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];
        $query = Articles::find();
        $articles = $query->orderBy('date DESC')->all();

        return $this->render('article-search', [
            'articles' => $articles,
            'months' => $months,
        ]);
    }

    public function actionArticlePage($id)
    {
        $months = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];
        $article = Articles::findOne($id);
        return $this->render('article-page', [
            'article' => $article,
            'months' => $months,
        ]);
    }

    public function actionFaq()
    {
        return $this->render('faq');
    }

    public function actionCase()
    {
        return $this->render('case');
    }

    public function actionFeedback()
    {
        return $this->render('feedback');
    }

    public function actionPayment()
    {
        return $this->render('payment');
    }

    public function actionBid()
    {
        return $this->render('bid');
    }

    public function actionThanks()
    {
        return $this->render('thanks');
    }

    public function actionThanksPayment()
    {
        return $this->render('thanks-payment');
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}