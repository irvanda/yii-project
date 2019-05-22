<?php

/**
 * This is the model class for table "bsc.orangtua".
 *
 * The followings are the available columns in table 'bsc.orangtua':
 * @property integer $id
 * @property string $nama_ayah
 * @property string $tempat_lahir_ayah
 * @property string $tanggal_lahir_ayah
 * @property string $pekerjaan_ayah
 * @property string $no_telp_ayah
 * @property string $email_ayah
 * @property string $facebook_ayah
 * @property string $nama_ibu
 * @property string $tempat_lahir_ibu
 * @property string $tanggal_lahir_ibu
 * @property string $alamat_ayah
 * @property string $alamat_ibu
 * @property string $pekerjaan_ibu
 * @property string $no_telp_ibu
 * @property string $email_ibu
 * @property string $facebook_ibu
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 */
class Orangtua extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Orangtua the static model class
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
		return 'orangtua';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_ayah, tempat_lahir_ayah, pekerjaan_ayah, no_telp_ayah, email_ayah, facebook_ayah, nama_ibu, tempat_lahir_ibu, pekerjaan_ibu, no_telp_ibu, email_ibu, facebook_ibu', 'length', 'max'=>45),
			array('tanggal_lahir_ayah, tanggal_lahir_ibu, alamat_ayah, alamat_ibu', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, pekerjaan_ayah, no_telp_ayah, email_ayah, facebook_ayah, nama_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, alamat_ayah, alamat_ibu, pekerjaan_ibu, no_telp_ibu, email_ibu, facebook_ibu', 'safe', 'on'=>'search'),
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
			'customers' => array(self::HAS_MANY, 'Customer', 'orangtua_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_ayah' => 'Nama Ayah',
			'tempat_lahir_ayah' => 'Tempat Lahir Ayah',
			'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
			'pekerjaan_ayah' => 'Pekerjaan Ayah',
			'no_telp_ayah' => 'No Telp Ayah',
			'email_ayah' => 'Email Ayah',
			'facebook_ayah' => 'Facebook Ayah',
			'nama_ibu' => 'Nama Ibu',
			'tempat_lahir_ibu' => 'Tempat Lahir Ibu',
			'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
			'alamat_ayah' => 'Alamat Ayah',
			'alamat_ibu' => 'Alamat Ibu',
			'pekerjaan_ibu' => 'Pekerjaan Ibu',
			'no_telp_ibu' => 'No Telp Ibu',
			'email_ibu' => 'Email Ibu',
			'facebook_ibu' => 'Facebook Ibu',
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
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('tempat_lahir_ayah',$this->tempat_lahir_ayah,true);
		$criteria->compare('tanggal_lahir_ayah',$this->tanggal_lahir_ayah,true);
		$criteria->compare('pekerjaan_ayah',$this->pekerjaan_ayah,true);
		$criteria->compare('no_telp_ayah',$this->no_telp_ayah,true);
		$criteria->compare('email_ayah',$this->email_ayah,true);
		$criteria->compare('facebook_ayah',$this->facebook_ayah,true);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('tempat_lahir_ibu',$this->tempat_lahir_ibu,true);
		$criteria->compare('tanggal_lahir_ibu',$this->tanggal_lahir_ibu,true);
		$criteria->compare('alamat_ayah',$this->alamat_ayah,true);
		$criteria->compare('alamat_ibu',$this->alamat_ibu,true);
		$criteria->compare('pekerjaan_ibu',$this->pekerjaan_ibu,true);
		$criteria->compare('no_telp_ibu',$this->no_telp_ibu,true);
		$criteria->compare('email_ibu',$this->email_ibu,true);
		$criteria->compare('facebook_ibu',$this->facebook_ibu,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}