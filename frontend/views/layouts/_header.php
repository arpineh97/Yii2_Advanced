<?php

use common\models\Category;

$categories = Category::find()->all();

?>

<header>
    <div class="container">
        <div class="top_ber">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_ber_left">
                        <?=  gmdate("l jS \of F Y h:i:s A"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-section">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo" style="font-size: 20px;">
                        <b>
                            <a  href="/site/index" style="padding-right: 20px">HOME</a>
                            <a href="/site/favorite">Favorite News</a>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar main-menu navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
                <ul class="nav navbar-nav">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <?php foreach ($categories as $category): ?>
                    <li><a class="page-scroll" href="/site/category/<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>