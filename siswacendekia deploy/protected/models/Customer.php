<?php

/**
 * This is the model class for table "bsc.customer".
 *
 * The followings are the available columns in table 'bsc.customer':
 * @property integer $User_id
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $alamat_rumah
 * @property string $asal_sekolah
 * @property string $alamat_sekolah
 * @property string $kelas_jurusan
 * @property string $no_hp
 * @property string $email
 * @property string $facebook
 * @property integer $anak_ke
 * @property integer $jumlah_saudara
 * @property string $cita_cita
 * @property string $hobi
 * @property string $moto
 * @property string $mapel_disukai
 * @property string $mapel_tidak_disukai
 * @property integer $orangtua_id
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Orangtua $orangtua
 * @property User $user
 * @property Feedback[] $feedbacks
 * @property JadwalBelajar[] $jadwalBelajars
 * @property JadwalBelajarMengajar[] $jadwalBelajarMengajars
 * @property Laporan[] $laporans
 * @property Pelajaran[] $pelajarans
 * @property Program[] $programs
 * @property Tagihan[] $tagihans
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('User_id, nama, alamat_rumah, asal_sekolah, alamat_sekolah, kelas_jurusan, no_hp, orangtua_id', 'required'),
			array('User_id, anak_ke, jumlah_saudara, orangtua_id', 'numerical', 'integerOnly'=>true),
			array('nama, alamat_rumah, alamat_sekolah', 'length', 'max'=>50),
			array('tempat_lahir, email, facebook', 'length', 'max'=>45),
			array('asal_sekolah, kelas_jurusan, no_hp', 'length', 'max'=>15),
			array('status', 'length', 'max'=>14),
			array('tanggal_lahir, cita_cita, hobi, moto, mapel_disukai, mapel_tidak_disukai', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('User_id, nama, tanggal_lahir, tempat_lahir, alamat_rumah, asal_sekolah, alamat_sekolah, kelas_jurusan, no_hp, email, facebook, anak_ke, jumlah_saudara, cita_cita, hobi, moto, mapel_disukai, mapel_tidak_disukai, orangtua_id, status', 'safe', 'on'=>'search'),
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
			'orangtua' => array(self::BELONGS_TO, 'Orangtua', 'orangtua_id'),
			'user' => array(self::BELONGS_TO, 'User', 'User_id'),
			'feedbacks' => array(self::HAS_MANY, 'Feedback', 'Customer_User_id'),
			'jadwalBelajars' => array(self::HAS_MANY, 'JadwalBelajar', 'Customer_User_id1'),
			'jadwalBelajarMengajars' => array(self::HAS_MANY, 'JadwalBelajarMengajar', 'Customer_User_id'),
			'laporans' => array(self::HAS_MANY, 'Laporan', 'Customer_User_id'),
			'pelajarans' => array(self::MANY_MANY, 'Pelajaran', 'pelajaran_has_customer(Customer_User_id, Pelajaran_id)'),
			'programs' => array(self::MANY_MANY, 'Program', 'program_has_customer(Customer_User_id, Program_id)'),
			'tagihans' => array(self::HAS_MANY, 'Tagihan', 'Customer_User_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'User_id' => 'User',
			'nama' => 'Nama',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tempat_lahir' => 'Tempat Lahir',
			'alamat_rumah' => 'Alamat Rumah',
			'asal_sekolah' => 'Asal Sekolah',
			'alamat_sekolah' => 'Alamat Sekolah',
			'kelas_jurusan' => 'Kelas Jurusan',
			'no_hp' => 'No Hp',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'anak_ke' => 'Anak Ke',
			'jumlah_saudara' => 'Jumlah Saudara',
			'cita_cita' => 'Cita Cita',
			'hobi' => 'Hobi',
			'moto' => 'Moto',
			'mapel_disukai' => 'Mapel Disukai',
			'mapel_tidak_disukai' => 'Mapel Tidak Disukai',
			'orangtua_id' => 'Orangtua',
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

		$criteria->compare('User_id',$this->User_id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('alamat_rumah',$this->alamat_rumah,true);
		$criteria->compare('asal_sekolah',$this->asal_sekolah,true);
		$criteria->compare('alamat_sekolah',$this->alamat_sekolah,true);
		$criteria->compare('kelas_jurusan',$this->kelas_jurusan,true);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('anak_ke',$this->anak_ke);
		$criteria->compare('jumlah_saudara',$this->jumlah_saudara);
		$criteria->compare('cita_cita',$this->cita_cita,true);
		$criteria->compare('hobi',$this->hobi,true);
		$criteria->compare('moto',$this->moto,true);
		$criteria->compare('mapel_disukai',$this->mapel_disukai,true);
		$criteria->compare('mapel_tidak_disukai',$this->mapel_tidak_disukai,true);
		$criteria->compare('orangtua_id',$this->orangtua_id);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}