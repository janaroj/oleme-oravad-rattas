<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for registrations.
 * It is used by the 'registration' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{

	public $email;
	public $password;
	public $confirmedPassword;
	public $phone;
	public $firstName;
	public $lastName;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// username,password,phone are required
			array('email, password,confirmedPassword,phone', 'required'),
			// phone needs to be integer
			array('phone', 'numerical', 'integerOnly'=>true),
			// passwords needs to match
			array('password', 'length', 'max'=>20, 'min'=>5),
            array('confirmedPassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Paroolid ei ühti"),
			//username must be email
			array('email','email'),
			//username must be unique
			array('email','unique', 'className' => 'Users', 'attributeName' => 'email'),
		);
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function register()
	{
		
		$user = new Users;
		$user->firstName=$this->firstName;
		$user->lastName=$this->lastName;
		$user->password=$this->password;
		$user->email=$this->email;
		$user->phone=$this->phone;

		$user->save();

	}
}
