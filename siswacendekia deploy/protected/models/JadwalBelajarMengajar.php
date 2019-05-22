<?php

/**
 * This is the model class for table "Jadwal_Belajar_Mengajar".
 *
 * The followings are the available columns in table 'Jadwal_Belajar_Mengajar':
 * @property integer $id
 * @property string $hari
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property integer $Pengajar_User_id
 * @property string $pelajaran
 * @property integer $Customer_User_id
 *
 * The followings are the available model relations:
 * @property Customer $customerUser
 * @property Pengajar $pengajarUser
 */
class JadwalBelajarMengajar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JadwalBelajarMengajar the static model class
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
		return 'jadwal_belajar_mengajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hari, jam_mulai, jam_selesai, pelajaran, Customer_User_id', 'required'),
			array('Pengajar_User_id, Customer_User_id', 'numerical', 'integerOnly'=>true),
			array('hari', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hari, jam_mulai, jam_selesai, Pengajar_User_id, pelajaran, Customer_User_id', 'safe', 'on'=>'search'),
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
			'hari' => 'Hari',
			'jam_mulai' => 'Jam Mulai',
			'jam_selesai' => 'Jam Selesai',
			'Pengajar_User_id' => 'Pengajar User',
			'pelajaran' => 'Pelajaran',
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
		$criteria->compare('hari',$this->hari,true);
		$criteria->compare('jam_mulai',$this->jam_mulai,true);
		$criteria->compare('jam_selesai',$this->jam_selesai,true);
		$criteria->compare('Pengajar_User_id',$this->Pengajar_User_id);
		$criteria->compare('pelajaran',$this->pelajaran,true);
		$criteria->compare('Customer_User_id',$this->Customer_User_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}