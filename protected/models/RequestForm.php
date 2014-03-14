<?php

class RequestForm extends CFormModel
{

	public $email;
	public $phone;
	public $text;
	public $name;
	public $carId;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('email, phone,name,text', 'required'),
			// phone needs to be integer
			array('phone', 'numerical', 'integerOnly'=>true),
			//mail must be email
			array('email','email'),
		);
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function request()
	{
		
		$request = new Requests;
		$request->carId=$this->carId;
		$request->name=$this->name;
		$request->text=$this->text;
		$request->phone=$this->phone;
		$request->mail=$this->email;

		$request->save();

	}
}
