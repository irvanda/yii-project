<?php

/**
 * Pengajar registration form class.
 * PengajarRegForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'PengajarController'.
 */
class UpdatePengajarForm extends CFormModel
{

	//var for pengajar data
	public $User_id;
	public $nama_lengkap;
	public $nama_panggilan;
	public $alamat_rumah;
	public $alamat_kost;
	public $no_hp;
	public $no_rekening;
	public $fakultas;
	public $jurusan;
	public $angkatan;
	public $ipk;
	public $tempat_lahir;
	public $tanggal_lahir;
	public $kemampuan_bahasa;
	public $hobby;
	public $cita_cita;
	public $karakter;
	public $kendaraan;
	public $status;
	//var untuk pengajar has pelajaran
	public $Pelajaran_id;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			///*pengajar data rules*////
			array('nama_lengkap, alamat_rumah, no_hp', 'required'),
			array('nama_lengkap', 'length', 'max'=>50),
			array('nama_panggilan', 'length', 'max'=>25),
			array('no_hp, no_rekening, fakultas, jurusan, angkatan, ipk, tempat_lahir, kendaraan', 'length', 'max'=>45),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			//Pengajar label
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
			'ipk' => 'Indeks Prestasi Kumulatif Terakhir',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'kemampuan_bahasa' => 'Kemampuan Bahasa',
			'hobby' => 'Hobby',
			'cita_cita' => 'Cita Cita',
			'karakter' => 'Karakter',
			'kendaraan' => 'Kendaraan yang dimiliki',
		);
	}


}
