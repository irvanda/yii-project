<?php

/**
 * This is the model class for table "bsc.pengajar".
 *
 * The followings are the available columns in table 'bsc.pengajar':
 * @property integer $User_id
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $alamat_rumah
 * @property string $alamat_kost
 * @property string $no_hp
 * @property string $no_rekening
 * @property string $fakultas
 * @property string $jurusan
 * @property string $status
 * @property string $angkatan
 * @property string $ipk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $kemampuan_bahasa
 * @property string $hobby
 * @property string $cita_cita
 * @property string $karakter
 * @property string $kendaraan
 *
 * The followings are the available model relations:
 * @property JadwalBelajarMengajar[] $jadwalBelajarMengajars
 * @property JadwalMengajar[] $jadwalMengajars
 * @property Laporan[] $laporans
 * @property LogMengajar[] $logMengajars
 * @property User $user
 * @property Pelajaran[] $pelajarans
 */
class Pengajar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pengajar the static model class
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
		return 'pengajar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('User_id, nama_lengkap, alamat_rumah, no_hp', 'required'),
			array('User_id', 'numerical', 'integerOnly'=>true),
			array('nama_lengkap', 'length', 'max'=>50),
			array('nama_panggilan', 'length', 'max'=>25),
			array('no_hp, no_rekening, fakultas, jurusan, angkatan, ipk, tempat_lahir, kendaraan', 'length', 'max'=>45),
			array('status', 'length', 'max'=>14),
			array('alamat_kost, tanggal_lahir, kemampuan_bahasa, hobby, cita_cita, karakter', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('User_id, nama_lengkap, nama_panggilan, alamat_rumah, alamat_kost, no_hp, no_rekening, fakultas, jurusan, status, angkatan, ipk, tempat_lahir, tanggal_lahir, kemampuan_bahasa, hobby, cita_cita, karakter, kendaraan', 'safe', 'on'=>'search'),
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
			'jadwalBelajarMengajars' => array(self::HAS_MANY, 'JadwalBelajarMengajar', 'Pengajar_User_id'),
			'jadwalMengajars' => array(self::HAS_MANY, 'JadwalMengajar', 'Pengajar_User_id'),
			'laporans' => array(self::HAS_MANY, 'Laporan', 'Pengajar_User_id'),
			'logMengajars' => array(self::HAS_MANY, 'LogMengajar', 'Pengajar_User_id'),
			'user' => array(self::BELONGS_TO, 'User', 'User_id'),
			'pelajarans' => array(self::MANY_MANY, 'Pelajaran', 'pengajar_has_pelajaran(Pengajar_User_id, Pelajaran_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'User_id' => 'User',
			'nama_lengkap' => 'Nama Lengkap',
			'nama_panggilan' => 'Nama Panggilan',
			'alamat_rumah' => 'Alamat Rumah',
			'alamat_kost' => 'Alamat Kost',
			'no_hp' => 'No Hp',
			'no_rekening' => 'No Rekening',
			'fakultas' => 'Fakultas',
			'jurusan' => 'Jurusan',
			'status' => 'Status',
			'angkatan' => 'Angkatan',
			'ipk' => 'Ipk',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'kemampuan_bahasa' => 'Kemampuan Bahasa',
			'hobby' => 'Hobby',
			'cita_cita' => 'Cita Cita',
			'karakter' => 'Karakter',
			'kendaraan' => 'Kendaraan',
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
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('nama_panggilan',$this->nama_panggilan,true);
		$criteria->compare('alamat_rumah',$this->alamat_rumah,true);
		$criteria->compare('alamat_kost',$this->alamat_kost,true);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('no_rekening',$this->no_rekening,true);
		$criteria->compare('fakultas',$this->fakultas,true);
		$criteria->compare('jurusan',$this->jurusan,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('angkatan',$this->angkatan,true);
		$criteria->compare('ipk',$this->ipk,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('kemampuan_bahasa',$this->kemampuan_bahasa,true);
		$criteria->compare('hobby',$this->hobby,true);
		$criteria->compare('cita_cita',$this->cita_cita,true);
		$criteria->compare('karakter',$this->karakter,true);
		$criteria->compare('kendaraan',$this->kendaraan,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}