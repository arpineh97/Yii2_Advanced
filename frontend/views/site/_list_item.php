<div class="container">
    <a href="/site/news/<?= $model->id ?>">
        <h2><?= $model->title ?></h2>
    </a>
    <i class="fa fa-eye"></i> <?= $model->hits; ?>
    <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($model->created_at) ?>
    <p><?= mb_substr($model->description, 0, 125).'...' ?></p>
</div>
<hr style="height:1px;background-color: #ccc">
