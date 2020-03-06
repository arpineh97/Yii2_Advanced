<?php

use frontend\widgets\CategoryWidget;

/* @var $this yii\web\View */

$this->title = 'Sport News';
?>

<section id="feature_category_section" class="feature_category_section section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= CategoryWidget::widget(['id'=>1]) ?>
                <?= CategoryWidget::widget(['id'=>2]) ?>
                <?= CategoryWidget::widget(['id'=>3]) ?>

            </div>
        </div>
    </div>
</section>

