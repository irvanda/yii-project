<?php

/**
 * This is the model class for table "Informasi".
 *
 * The followings are the available columns in table 'Informasi':
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 * @property string $content
 * @property integer $author_id
 * @property string $tags
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Image[] $images
 * @property User $author
 */
class Informasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Informasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'informasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, status', 'required'),
			array('author_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('status', 'length', 'max'=>9),
			array('create_time, update_time, tags', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, create_time, update_time, content, author_id, tags, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'images' => array(self::HAS_MANY, 'Image', 'Informasi_idInformasi'),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'content' => 'Content',
			'author_id' => 'Author',
			'tags' => 'Tags',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->update_time=date("Y-m-d H:i:s", time());
				$this->author_id=Yii::app()->user->id;
			}
			else
				$this->update_time=date("Y-m-d H:i:s", time());
			return true;
		}
		else
			return false;
	}
	
}