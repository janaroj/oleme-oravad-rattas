<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria->limit=8;
		$criteria->order="ID ASC";

		$cars = Cars::model()->findAll($criteria);

		$this->render('index', array(
			'cars'=>$cars
		));	
	}

	public function actionMyUser()
	{	
		$this->render('myUser');
	}

	public function actionAddCar()
	{
		$model = new AddCarForm;
		if(isset($_POST['AddCarForm']))
		{
			$model->attributes=$_POST['AddCarForm'];
			if ($model->validate()) {
				$model->save();
				Yii::app()->user->returnUrl=array('myUser');
        		$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$this->render('addCar',array('model'=>$model));
	}

	public function actionRegistration() 
	{
		$model = new RegistrationForm;
		if(isset($_POST['RegistrationForm']))
		{
			$model->attributes=$_POST['RegistrationForm'];
			if ($model->validate()) {
				$model->register();
				Yii::app()->user->returnUrl=array('myUser');
        		$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$this->render('registration',array('model'=>$model));
	}

	public function actionLogin()
{
    $model=new LoginForm;
    if(isset($_POST['LoginForm']))
    {
        // collects user input data
        $model->attributes=$_POST['LoginForm'];
        // validates user input and redirect to previous page if validated
        if($model->validate())
        	$this->redirect(Yii::app()->user->returnUrl);
    }
    // displays the login form
    $this->render('login',array('model'=>$model));
}

	public function actionLogout()
	{
		 Yii::app()->user->logout();
		 Yii::app()->user->clearStates();
		 $_SESSION = array();
		 $this->redirect(array("index"));

	}

	public function actionObject()
	{

		$id = $_GET['id'];
		
		$car = Cars::model()->findByPk($id);
		$criteria = new CDbCriteria();
		$criteria->condition="carId=:id";
		$criteria->params = array(':id' => $id );

		$car_images = CarPictures::model()->findAll($criteria);

		//print_r($car_images);


		//print_r($car);

		$this->render('object',array(
			'car'=>$car,
			'images' =>$car_images
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function filters(){
		 return array(
            'accessControl',
        );
	}

	public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('logout', 'addCar','myUser'),
                'users'=>array('?'),
            ),
            array('deny',
                'actions'=>array('login', 'registration'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('logout','myUser','addCar'),
                'roles'=>array('@'),
            ),
             array('allow',
                'actions'=>array('index','error','object','login','registration'),
                'roles'=>array('*'),
            ),
        );
    }

}