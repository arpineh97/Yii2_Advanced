<?php

use common\models\Category;

$categories = Category::find()->all();

?>

<footer class="footer_section section_wrapper section_wrapper" >
    <div class="footer_top_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text_widget footer_widget">
                        <div class="footer_widget_title"><h2>About Sports Mag</h2></div>

                        <div class="footer_widget_content">Collaborativelyadministrate empowered marketsplug-and-play
                            networks. Dynamic procrastinate after.marketsplug-and-play networks. Dynamic procrastinate
                            users after. Dynamic procrastinateafter. marketsplug-and-play networks. Dynamic
                            procrastinate users after. Collaborativelyadministrate empowered marketsplug-and-play
                            networks. Dynamic procrastinate after.marketsplug-and-play networks. Dynamic procrastinate
                            users after. Dynamic procrastinateafter. marketsplug-and-play networks.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer_widget">
                        <div class="footer_widget_title"><h2>Discover</h2></div>
                        <div class="footer_menu_item ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="nav navbar-nav ">
                                        <?php foreach ($categories as $category): ?>
                                        <li><a href="/site/category/<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-section">
        <div class="container" style="align-items: center">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        © Copyright
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>