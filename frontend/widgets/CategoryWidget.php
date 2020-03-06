<?php

namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;

class CategoryWidget extends Widget
{

    public $id;

    public function run()
    {
        $category = Category::find()->where(['id'=>$this->id])->one();
        return $this->render('category', compact('category'));
    }
}
