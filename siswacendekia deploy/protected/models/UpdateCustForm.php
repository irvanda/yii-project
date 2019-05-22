<?php

/**
 * Customer registration form class.
 * CustRegForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'CustomerController'.
 */
class UpdateCustForm extends CFormModel
{

	//var for customer data
	public $User_id;
	public $nama;
	public $tanggal_lahir;
	public $tempat_lahir;
	public $alamat_rumah;
	public $asal_sekolah;
	public $alamat_sekolah;
	public $kelas_jurusan;
	public $no_hp;
	public $email;
	public $facebook;
	public $anak_ke;
	public $jumlah_saudara;
	public $cita_cita;
	public $hobi;
	public $moto;
	public $mapel_disukai;
	public $mapel_tidak_disukai;
	public $orangtua_id;
	public $status;

	//var for orang tua data
	public $id;
	public $nama_ayah;
	public $tempat_lahir_ayah;
	public $tanggal_lahir_ayah;
	public $pekerjaan_ayah;
	public $no_telp_ayah;
	public $email_ayah;
	public $facebook_ayah;
	public $nama_ibu;
	public $tempat_lahir_ibu;
	public $tanggal_lahir_ibu;
	public $alamat_ayah;
	public $alamat_ibu;
	public $pekerjaan_ibu;
	public $no_telp_ibu;
	public $email_ibu;
	public $facebook_ibu;

	//var untuk customer has program
	public $Program_id;
	
	//var untuk customer has pelajaran
	public $Pelajaran_id;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			///*customer data rules*////
			array('nama, alamat_rumah, asal_sekolah, alamat_sekolah, kelas_jurusan, no_hp', 'required'),
			array('User_id, anak_ke, jumlah_saudara, orangtua_id', 'numerical', 'integerOnly'=>true),
			array('nama, alamat_rumah, alamat_sekolah', 'length', 'max'=>50),
			array('tempat_lahir, email, facebook', 'length', 'max'=>45),
			array('asal_sekolah, kelas_jurusan, no_hp', 'length', 'max'=>15),
			array('tanggal_lahir, cita_cita, hobi, moto, mapel_disukai, mapel_tidak_disukai', 'safe'),

			///*orang tua data rules*////
			array('nama_ayah, tempat_lahir_ayah, pekerjaan_ayah, no_telp_ayah, email_ayah, facebook_ayah, nama_ibu, tempat_lahir_ibu, pekerjaan_ibu, no_telp_ibu, email_ibu, facebook_ibu', 'length', 'max'=>45),
			array('tanggal_lahir_ayah, tanggal_lahir_ibu, alamat_ayah, alamat_ibu', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			//Customer label
			'nama' => 'Nama Lengkap',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tempat_lahir' => 'Tempat Lahir',
			'alamat_rumah' => 'Alamat Rumah',
			'asal_sekolah' => 'Asal Sekolah',
			'alamat_sekolah' => 'Alamat Sekolah',
			'kelas_jurusan' => 'Kelas/Jurusan',
			'no_hp' => 'No Hp',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'anak_ke' => 'Anak Ke',
			'jumlah_saudara' => 'Jumlah Saudara',
			'cita_cita' => 'Cita Cita',
			'hobi' => 'Hobi',
			'moto' => 'Motto',
			'mapel_disukai' => 'Mapel Disukai',
			'mapel_tidak_disukai' => 'Mapel Tidak Disukai',
			'status' => 'Status',
			//orang tua label
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
			'Program_id'=>'Pilih program yang ingin diikuti',
			'Pelajaran_id'=>'Pilih pelajaraan yang ingin diikuti',
		);
	}
}
