<?php

/**
 * This is the model class for table "Log_Mengajar".
 *
 * The followings are the available columns in table 'Log_Mengajar':
 * @property integer $id
 * @property string $tanggal
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property string $deskripsi
 * @property integer $Pengajar_User_id
 *
 * The followings are the available model relations:
 * @property Pengajar $pengajarUser
 */
class LogMengajar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LogMengajar the static model class
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
		return 'log_mengajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, jam_mulai, jam_selesai, deskripsi, Pengajar_User_id', 'required'),
			array('Pengajar_User_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal, jam_mulai, jam_selesai, deskripsi, Pengajar_User_id', 'safe', 'on'=>'search'),
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
			'tanggal' => 'Tanggal',
			'jam_mulai' => 'Jam Mulai',
			'jam_selesai' => 'Jam Selesai',
			'deskripsi' => 'Deskripsi',
			'Pengajar_User_id' => 'Pengajar User',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jam_mulai',$this->jam_mulai,true);
		$criteria->compare('jam_selesai',$this->jam_selesai,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('Pengajar_User_id',$this->Pengajar_User_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}