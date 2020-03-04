<?php /* @var $category */ ?>

    <div class="category_layout">
        <div class="item_caregory blue"><h2><a href="/site/category/<?= $category->id ?>"><?= $category->name ?></a></h2></div>
        <div class="row">
            <div class="col-md-7">
                <div class="item feature_news_item">
                    <div class="item_wrapper">
                        <div class="item_img">
                            <img class="img-responsive" src="<?= $category->top->getImage(); ?>" alt="">
                        </div>
                        <div class="item_title_date">
                            <div class="news_item_title">
                                <h2><a href="/site/news/<?= $category->top->id?>"><?= $category->top->title?></a></h2>
                                <i class="fa fa-eye"></i> <?= $category->top->hits; ?>
                                <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($category->top->created_at) ?>
                            </div>
                        </div>
                    </div>
                    <div class="item_content"><?= mb_substr($category->top->description,0,80).'...'?></div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="media_wrapper">

                    <?php if ($category->limitNews):?>
                        <?php foreach($category->limitNews as $catNews):?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="/news/<?= $catNews->id ?>">
                                        <img class="media-object" src="<?= $catNews->getImage()?>"
                                             alt="<?= $catNews->title?>" height="100"></a>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="/site/news/<?= $catNews->id ?>">
                                            <?= $catNews->title?>
                                        </a>
                                    </h3>
                                    <i class="fa fa-eye"></i> <?= $catNews->hits ?>
                                    <i class="fa fa-calendar"></i> <?= Yii::$app->formatter->asDate($catNews->created_at) ?>
                                    <p><?= mb_substr($catNews->description,0,80).'...'?></p>

                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
