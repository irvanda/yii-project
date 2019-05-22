<?php

/**
 * This is the model class for table "Tagihan".
 *
 * The followings are the available columns in table 'Tagihan':
 * @property integer $id
 * @property string $bulan
 * @property string $tahun
 * @property integer $status_pembayaran
 * @property integer $persetujuan
 * @property integer $Customer_User_id
 *
 * The followings are the available model relations:
 * @property BarisTagihan[] $barisTagihans
 * @property Customer $customerUser
 */
class Tagihan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tagihan the static model class
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
		return 'tagihan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bulan, tahun, Customer_User_id', 'required'),
			array('status_pembayaran, persetujuan, Customer_User_id', 'numerical', 'integerOnly'=>true),
			array('bulan', 'length', 'max'=>2),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bulan, tahun, status_pembayaran, persetujuan, Customer_User_id', 'safe', 'on'=>'search'),
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
			'barisTagihans' => array(self::HAS_MANY, 'BarisTagihan', 'Tagihan_id'),
			'customerUser' => array(self::BELONGS_TO, 'Customer', 'Customer_User_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bulan' => 'Bulan',
			'tahun' => 'Tahun',
			'status_pembayaran' => 'Status Pembayaran',
			'persetujuan' => 'Persetujuan',
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
		$criteria->compare('bulan',$this->bulan,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('status_pembayaran',$this->status_pembayaran);
		$criteria->compare('persetujuan',$this->persetujuan);
		$criteria->compare('Customer_User_id',$this->Customer_User_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}