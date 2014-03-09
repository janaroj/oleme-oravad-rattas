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
	public $images;



	
	public function rules()
	{
		return array(
			
			array('make, model,location,year,color,status,price,description', 'required'),
			
			array('year,price', 'numerical'),

			array('image,images', 'file','types'=>'jpg, gif, png,jpeg', 'allowEmpty'=>true),
			
		);
	}

	public function saveImages($carId){
		if (is_array($this->images)) {
			foreach ($this->images as $img) {
				$carPictures = new CarPictures;
				$carPictures->carId=$carId;
				$carPictures->picture="{$img}";
				$carPictures->save();
			}
		}
		
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
