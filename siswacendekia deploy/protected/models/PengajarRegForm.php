<?php

/**
 * Pengajar registration form class.
 * PengajarRegForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'PengajarController'.
 */
class PengajarRegForm extends CFormModel
{
	//var for user data
	public $username;
	public $password;
	public $password2;
	public $avatar;
	
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
			///*user data rules*////			
			// username and password are required
			array('username, password, password2, Pelajaran_id', 'required'),
			//password must match with password2
			array('password', 'compare', 'compareAttribute'=>'password2'),
			// constraint
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>8),
			
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
			'password2'=>'Retype Password',
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

	/**
	 * Create data pengajar
	 */
	public function createPengajar()
	{
		//for user data
		$user = new User;
		$userhasrole =  new UserHasRole;
		
		//for customer data
		$pengajar = new Pengajar;
		
		//for pengajar has pelajaran
		$pelajaran = array();
		
		$user->username = $this->username;
		$user->password = $this->password;
		if($user->save())
		{
			$this->User_id = $user->id;
			$userhasrole->User_id = $user->id;
			$userhasrole->Role_id = 3; //role id 3 is role for pengajar
			$pengajar->attributes = $this->attributes; //id is included
			
			if($userhasrole->save() && $pengajar->save())
			{	
				$i = 0;
				foreach($this->Pelajaran_id as $pelajaranid)
				{
					$pelajaran[i] = new PengajarHasPelajaran;
					$pelajaran[i]->Pelajaran_id = $pelajaranid;
					$pelajaran[i]->Pengajar_User_id = $this->User_id;
					$pelajaran[i]->save();
					$i++;
				}
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
}
