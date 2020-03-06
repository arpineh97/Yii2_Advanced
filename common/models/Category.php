<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property NewsCategory[] $newsCategory
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[NewsCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::class, ['categories_id' => 'id']);
    }


    public function getTop()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])
            ->via('newsCategories')
            ->orderBy(['hits'=>SORT_DESC])->one();
    }


    public function getLimitNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])
            ->via('newsCategories')
            ->where(['!=','id',$this->getTop()->id]);
    }

    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])
            ->via('newsCategories');
    }

}
