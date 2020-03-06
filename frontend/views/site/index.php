<?php

use common\models\Category;
use frontend\widgets\CategoryWidget;

/* @var $this yii\web\View */

$this->title = 'Sport News';

$categories = Category::find()->all();

?>

<section id="feature_category_section" class="feature_category_section section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($categories as $category): ?>
                <?= CategoryWidget::widget(['id'=>$category['id']]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

