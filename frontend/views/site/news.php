<?php
/* @var $news
*/
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\helpers\Html;

?>
<div class="container">
    <h2><?= $news->title ?></h2>
    <i class="fa fa-eye"></i> <?= $news->hits?>
    <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($news->created_at) ?>
    <p><?= $news->description ?></p>
</div>

<div class="container">
    <h3>Pictures from zxbodya/yii2-gallery-manager</h3>
    <?php foreach($news->getBehavior('galleryBehavior')->getImages() as $image) : ?>
    <?= Html::img($image->getUrl('small')); ?>
    <?php endforeach;?>

</div>
