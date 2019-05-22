<?php

/**
 * This is the model class for table "bsc.laporan".
 *
 * The followings are the available columns in table 'bsc.laporan':
 * @property integer $id
 * @property string $detail
 * @property string $date
 * @property integer $Pengajar_User_id
 * @property integer $Customer_User_id
 *
 * The followings are the available model relations:
 * @property Customer $customerUser
 * @property Pengajar $pengajarUser
 */
class Laporan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Laporan the static model class
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
		return 'laporan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detail, date, Pengajar_User_id, Customer_User_id', 'required'),
			array('Pengajar_User_id, Customer_User_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, detail, date, Pengajar_User_id, Customer_User_id', 'safe', 'on'=>'search'),
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
			'customerUser' => array(self::BELONGS_TO, 'Customer', 'Customer_User_id'),
			'pengajarUser' => array(self::BELONGS_TO, 'Pengajar', 'Pengajar_User_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'detail' => 'Detail',
			'date' => 'Date',
			'Pengajar_User_id' => 'Pengajar User',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('Pengajar_User_id',$this->Pengajar_User_id);
		$criteria->compare('Customer_User_id',$this->Customer_User_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			
			$this->date=date("Y-m-d");
			return true;
		}
		else
			return false;
	}
}