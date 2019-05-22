<?php

/**
 * Customer registration form class.
 * CustRegForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'CustomerController'.
 */
class CustRegForm extends CFormModel
{
	//var for user data
	public $username;
	public $password;
	public $password2;
	public $avatar;
	
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
	
	//var role
	public $role;
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
			array('username, password, password2, Program_id, Pelajaran_id', 'required'),
			//password must match with password2
			array('password', 'compare', 'compareAttribute'=>'password2'),
			// constraint
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>8),
			
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
			'password2'=>'Retype Password',
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

	/**
	 * Create data customer
	 */
	public function createCustomer()
	{
		//for user data
		$user = new User;
		$userhasrole =  new UserHasRole;
		
		//for customer data
		$customer = new Customer;
		
		//for orang tua data
		$orangtua = new Orangtua;
		
		//for pelajaran has customer
		$pelajaran = array();
		
		//for program has customer
		$program = new ProgramHasCustomer;
		
		$user->username = $this->username;
		$user->password = $this->password;
		$orangtua->attributes = $this->attributes;
		if($user->save())
		{
			$this->User_id = $user->id;
			$userhasrole->User_id = $user->id;
			$userhasrole->Role_id = 2; //role id is role for customer
			$customer->attributes = $this->attributes; //sudah termasuk id usernyya
			$customer->status = $this->status;
			if($userhasrole->save() &&  $orangtua->save())
			{	
			
				$customer->orangtua_id = $orangtua->id;
				if($customer->save())
				{
					$program->Program_id=$this->Program_id;
					$program->Customer_User_id=$this->User_id;
					$program->save();
					$i = 0;
					foreach($this->Pelajaran_id as $pelajaranid)
					{
						$pelajaran[i] = new PelajaranHasCustomer;
						$pelajaran[i]->Pelajaran_id = $pelajaranid;
						$pelajaran[i]->Customer_User_id = $this->User_id;
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
		else
			return false;
	}
}
