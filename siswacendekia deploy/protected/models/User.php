<?php

/**
 * This is the model class for table "bsc.user".
 *
 * The followings are the available columns in table 'bsc.user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Image[] $images
 * @property Pengajar $pengajar
 * @property Role[] $roles
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('username', 'length', 'max'=>25),
			array('password, salt', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, salt', 'safe', 'on'=>'search'),
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
			'customer' => array(self::HAS_ONE, 'Customer', 'User_id'),
			'images' => array(self::HAS_MANY, 'Image', 'User_ID'),
			'pengajar' => array(self::HAS_ONE, 'Pengajar', 'User_id'),
			'roles' => array(self::MANY_MANY, 'Role', 'user_has_role(User_id, Role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->salt = '28b206548469ce62182048fd9cf91760';
			$this->password = $this->hashPassword($this->password, $this->salt);
		}
		return true;
	}
	
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	
	public function getRoleOptions()
	{
		return array(
			1 => 'Admin',
			2 => 'Siswa',
			3 => 'Pengajar',
		);
	}
}