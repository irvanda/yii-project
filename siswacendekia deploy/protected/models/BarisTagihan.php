<?php

/**
 * This is the model class for table "Baris_Tagihan".
 *
 * The followings are the available columns in table 'Baris_Tagihan':
 * @property integer $ID
 * @property string $details
 * @property double $biaya
 * @property string $date
 * @property integer $Tagihan_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Tagihan $tagihan
 */
class BarisTagihan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BarisTagihan the static model class
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
		return 'baris_tagihan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('biaya, date, Tagihan_id, status', 'required'),
			array('Tagihan_id, status', 'numerical', 'integerOnly'=>true),
			array('biaya', 'numerical'),
			array('details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, details, biaya, date, Tagihan_id, status', 'safe', 'on'=>'search'),
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
			'tagihan' => array(self::BELONGS_TO, 'Tagihan', 'Tagihan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'details' => 'Details',
			'biaya' => 'Biaya',
			'date' => 'Date',
			'Tagihan_id' => 'Tagihan',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('biaya',$this->biaya);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('Tagihan_id',$this->Tagihan_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}