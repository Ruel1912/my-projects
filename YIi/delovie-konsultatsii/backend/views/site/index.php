<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Деловые консультации';

if (!Yii::$app->user->isGuest) {

  $new_url = Url::to(['/cases']);
  header('Location: ' . $new_url);
  exit();
} else {
  $new_url = Url::to(['/login']);
  header('Location: ' . $new_url);
  exit();
}
?>

