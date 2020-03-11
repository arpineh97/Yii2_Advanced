<?php

use common\models\News;
use yii\web\NotFoundHttpException;

$cookies = Yii::$app->request->cookies;

if(count($cookies) == 1)
    throw new NotFoundHttpException('The requested page does not exist.');
else {
?>

<div class="container">
    <h3 style="text-align: center; font-size: 36px"><b>Favorite News</b></h3>

        <?php foreach ($cookies as $cookie): ?>
            <?php if (true) : ?>

                <?php if ($cookie->name == '_csrf-frontend') continue; ?>
                <?php $id = substr($cookie->name, 4); ?>
                <?php $news = News::find()->where(['id'=>$id])->one(); ?>

                <div class="container">
                    <h2> <?= $id ?> . <?= $news->title ?> </h2>
                    <i class="fa fa-eye"></i> <?= $news->hits ?>
                    <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($news->created_at) ?>
                    <p> <?= $news->description ?> </p>
                 </div>

            <?php endif; ?>
        <?php endforeach; ?>

</div>
<?php } ?>