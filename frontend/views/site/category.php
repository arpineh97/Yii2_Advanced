<?php
/* @var $dataProvider
 * @var $category
*/
use yii\widgets\ListView;
?>

<div class="container">
    <h2 style="text-align: center; font-size: 32px; font-weight: bold;"><?= $category->name; ?></h2>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list_item',
    'summary'=>''
]);?>
</div>