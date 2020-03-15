<?php

/* @var $dataProvider
 * @var $news
 */
//debug($dataProvider);
//debug($news[0]->title);
use common\models\News;
use yii\web\NotFoundHttpException;
use yii\widgets\ListView;

$cookies = Yii::$app->request->cookies;

if(count($cookies) == 1)
    throw new NotFoundHttpException('The requested page does not exist.');
else {
?>

<div class="container">
    <h3 style="text-align: center; font-size: 36px"><b>Favorite News</b></h3>
        <?php foreach ($cookies as $cookie) : ?>
            <?php if (true) : ?>
                <?php if ($cookie->name == '_csrf-frontend') continue; ?>
                <?php $id = $cookie->value /* substr($cookie->name, 4)*/; ?>
                <?php $allNews = $news->where(['in', 'id', $id]) ; ?>
                <div class="container">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_list_item',
                        'summary'=>''
                    ]);?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
</div>
<?php } ?>