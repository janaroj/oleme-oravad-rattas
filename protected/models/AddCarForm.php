<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AddCarForm extends CFormModel
{
	public $userId;
	public $make;
	public $model;
	public $location;
	public $year;
	public $color;
	public $status;
	public $description;
	public $price;
	public $image;



	
	public function rules()
	{
		return array(
			
			array('make, model,location,year,color,status,price,description', 'required'),
			
			array('year,price', 'numerical'),

			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			
		);
	}



	public function save()
	{
		$car = new Cars;
		$car->userId=Yii::app()->user->getId(); 
		$car->make=$this->make;
		$car->model=$this->model;
		$car->location=$this->location;
		$car->year=$this->year;
		$car->color=$this->color;
		$car->status=$this->status;
		$car->description=$this->description;
		$car->price=$this->price;
		$car->mainImg=$this->image;
		
		$car->save();
	}
}
