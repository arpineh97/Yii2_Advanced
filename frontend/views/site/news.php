<?php
/* @var $news
*/
?>

<div class="container">
    <h2><?= $news->title ?></h2>
    <i class="fa fa-eye"></i> <?= $news->hits?>
    <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($news->created_at) ?>
    <p><?= $news->description ?></p>
</div>