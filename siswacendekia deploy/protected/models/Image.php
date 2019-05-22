<?php

/**
 * This is the model class for table "bsc.image".
 *
 * The followings are the available columns in table 'bsc.image':
 * @property integer $id
 * @property string $image
 * @property string $dates
 * @property integer $User_ID
 * @property integer $Informasi_idInformasi
 *
 * The followings are the available model relations:
 * @property Informasi $informasiIdInformasi
 * @property User $user
 */
class Image extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Image the static model class
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
		return 'image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image', 'required'),
			array('User_ID, Informasi_idInformasi', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, dates, User_ID, Informasi_idInformasi', 'safe', 'on'=>'search'),
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
			'informasiIdInformasi' => array(self::BELONGS_TO, 'Informasi', 'Informasi_idInformasi'),
			'user' => array(self::BELONGS_TO, 'User', 'User_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'dates' => 'Dates',
			'User_ID' => 'User',
			'Informasi_idInformasi' => 'Informasi Id Informasi',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('dates',$this->dates,true);
		$criteria->compare('User_ID',$this->User_ID);
		$criteria->compare('Informasi_idInformasi',$this->Informasi_idInformasi);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}