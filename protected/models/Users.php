<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $ID
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property integer $acc_status
 * @property string $lastActive
 *
 * The followings are the available model relations:
 * @property Cars[] $cars
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, email, phone, password', 'length', 'max'=>45),
			array('lastActive', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, firstName, lastName, email, phone, password, acc_status, lastActive', 'safe', 'on'=>'search'),
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
			'cars' => array(self::HAS_MANY, 'Cars', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'password' => 'Password',
			'acc_status' => 'Acc Status',
			'lastActive' => 'Last Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('acc_status',$this->acc_status);
		$criteria->compare('lastActive',$this->lastActive,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
   /**
   * Returns User model by its email
   * 
   * @param string $email 
   * @access public
   * @return User
   */
 	
	  public function findByEmail($email)
	  {
	    return self::model()->findByAttributes(array('email' => $email));
	  }
  
 	public function verifyPassword($password)
 	 {
 	 	if($this->password == $password){
 	 		return true;
 	 	}
 	 	return false;
 	 } 

 	public function isMinutesPassed ($minutes) {
 	 	$time = strtotime($this->lastActive);
    	$timeDifference = time() - $time; // to get the time since that moment

	    if ($timeDifference >= 60 * $minutes) {
	    	return true;
	    }
	    return false;
	}

}
