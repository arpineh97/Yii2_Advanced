<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 *
 * @property NewsCategory[] $newsCategory
 */
class News extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title', 'description', 'image'], 'safe'],
            [['title', 'description'], 'string', 'max' => 500],
            ['image', 'file', 'extensions' => ['jpg']],
            [['created_at', 'updated_at', 'hits'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'hits' => 'Hits',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * Gets query for [[NewsCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::class, ['news_id' => 'id']);
    }

    public function getCategories()
    {
//        return $this->hasMany(News::class, ['id' => 'news_id'])
//            ->viaTable('categories', ['id' => 'categories_id']);
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->via('newsCategory');
    }

    public function uploadImage($name)
    {
        $path = Yii::getAlias('@frontend') . '/web/images/news/';
        if (!is_dir($path)) {
            FileHelper::createDirectory($path);
        }

        $this->image->saveAs(Yii::getAlias($path . $name . '.' . $this->image->extension));
    }

    public function deleteImage()
    {
        $img = glob(Yii::getAlias('@frontend') . '/web/images/news/' . $this->id . '.*');

        if ($img) {
            @unlink($img[0]);
        }
    }

    public function getImage()
    {
        $img = '/frontend/web/images/news/' . $this->id . '.jpg';
        return $img;
    }

}
