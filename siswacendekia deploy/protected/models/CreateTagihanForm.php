<?php

/**
 * Customer registration form class.
 * CustRegForm is the data structure for keeping
 * The followings are the available columns in table 'Baris_Tagihan':
 * @property integer $id
 * @property string $bulan
 * @property string $tahun
 * @property integer $status_pembayaran
 * @property integer $persetujuan
 * @property integer $Customer_User_id
 *
 * user registration form data. It is used by the 'register' action of 'CustomerController'.
 */
class CreateTagihanForm extends CFormModel
{
	//var for user data
	public $id;
	public $bulan;
	public $tahun;
	public $status_pembayaran;
	public $persetujuan;
	public $Customer_User_id;
		
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('bulan, tahun', 'required'),
			array('status_pembayaran, persetujuan, Customer_User_id', 'numerical', 'integerOnly'=>true),
			array('bulan', 'length', 'max'=>2),
			array('tahun', 'length', 'max'=>4),
		);
	}

	/**
	 * Declares attribute labels.
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
	 * Create data customer
	 */
	public function createTagihan()
	{
		$tagihan = new Tagihan;
		$tagihan->attributes = $this->attributes;
		if($tagihan->save())
		{
			$this->id=$tagihan->id;
			return true;
		}
		else 
			return false;
	}
}
