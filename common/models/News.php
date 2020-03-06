<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use zxbodya\yii2\galleryManager\GalleryBehavior;

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
        $path = Yii::getAlias('@frontend') . '/web/images/news/gallery/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        return [

            TimestampBehavior::class,

            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'news',
                'extension' => 'jpg',
                'directory' => $path,
                'url' => '/images/news/gallery/',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
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

    public function uploadImage()
    {
        $path = Yii::getAlias('@frontend') . '/web/images/news/';
        if (!is_dir($path)) {
            FileHelper::createDirectory($path);
        }

        $this->image->saveAs(Yii::getAlias($path . $this->id . '.' . $this->image->extension));
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
        return '/frontend/web/images/news/' . $this->id . '.jpg';
    }

}
