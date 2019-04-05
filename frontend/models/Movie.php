<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property int $category_id
 * @property int $director_id
 * @property string $name
 * @property string $content
 * @property string $update_at
 * @property string $create_at
 *
 * @property Category $category
 * @property Director $director
 */
class Movie extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'director_id'], 'integer'],
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['update_at', 'create_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Director::className(), 'targetAttribute' => ['director_id' => 'id']],
        ];
    }

    public function scenarios ()
    {
        $scenarios= parent::scenarios();
        $scenarios['create']= ['name','category_id','director_id','content'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'director_id' => 'Director ID',
            'name' => 'Name',
            'content' => 'Content',
            'update_at' => 'Update At',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Director::className(), ['id' => 'director_id']);
    }

    /**
     * {@inheritdoc}
     * @return MovieQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MovieQuery(get_called_class());
    }
}
