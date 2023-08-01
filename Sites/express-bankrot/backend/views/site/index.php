<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$new_url = Url::to(['/articles']);
header('Location: ' . $new_url);
exit();

?>

