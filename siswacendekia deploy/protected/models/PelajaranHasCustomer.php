<?php

/**
 * This is the model class for table "bsc.pelajaran_has_customer".
 *
 * The followings are the available columns in table 'bsc.pelajaran_has_customer':
 * @property integer $Pelajaran_id
 * @property integer $Customer_User_id
 *
 * The followings are the available model relations:
 */
class PelajaranHasCustomer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PelajaranHasCustomer the static model class
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
		return 'pelajaran_has_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Pelajaran_id, Customer_User_id', 'required'),
			array('Pelajaran_id, Customer_User_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Pelajaran_id, Customer_User_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Pelajaran_id' => 'Pelajaran',
			'Customer_User_id' => 'Customer User',
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

		$criteria->compare('Pelajaran_id',$this->Pelajaran_id);
		$criteria->compare('Customer_User_id',$this->Customer_User_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}