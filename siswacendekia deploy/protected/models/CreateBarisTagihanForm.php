<?php

/**
 * Customer registration form class.
 * CustRegForm is the data structure for keeping
 * The followings are the available columns in table 'Baris_Tagihan':
 * @property integer $ID
 * @property string $details
 * @property double $biaya
 * @property string $date
 * @property integer $Tagihan_id
 * @property integer $status
 *
 * user registration form data. It is used by the 'register' action of 'CustomerController'.
 */
class CreateBarisTagihanForm extends CFormModel
{
	//var for user data
	public $ID;
	public $details;
	public $biaya;
	public $date;
	public $Tagihan_id;
	public $status;
	public $siswa_id;
		
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('biaya, status', 'required'),
			array('Tagihan_id, status', 'numerical', 'integerOnly'=>true),
			array('biaya', 'numerical'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'details' => 'Details',
			'biaya' => 'Biaya',
			'date' => 'Date',
			'Tagihan_id' => 'Tagihan',
			'status' => 'Status',
		);
	}

	/**
	 * Create data customer
	 */
	public function createBarisTagihan()
	{
		$baris_tagihan = new BarisTagihan;
		$baris_tagihan->attributes = $this->attributes;
		if($baris_tagihan->save())
			return true;
		else 
			return false;
	}
}
