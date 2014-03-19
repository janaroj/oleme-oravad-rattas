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
		$criteria->offset=0;
		$criteria->order="Date DESC";

		$cars = Cars::model()->findAll($criteria);

		$this->render('index', array(
			'cars'=>$cars
		));	
	}

	private function rmdir_recursive($dir) {
	if (file_exists ($dir)) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
	}
}

	public function actionChangeCar() {
		$id = $_GET['carId'];
		$model = Cars::model()->findByPk($id);

		if(isset($_POST['Cars']))
		{
			$model->attributes=$_POST['Cars'];
			$uploadedFile=CUploadedFile::getInstance($model,'image');
  			$uploadedFiles=CUploadedFile::getInstancesByName('images');

		
			if ($model->validate()) {
			
           
				$transaction = Yii::app()->db->beginTransaction();
				try {
 			 $model->saveData($uploadedFile,$uploadedFiles);
 			 $transaction->commit();
 			 Yii::app()->user->returnUrl=array('myCars');
        	 $this->redirect(Yii::app()->user->returnUrl);
        	 }
				catch (Exception $e)
				{
				$transaction->rollBack();
				} 

        	}
			

		}

		$this->render('changeCar',array('model'=>$model));
	}

	public function actionDeleteCar() { 
		$id = $_GET['carId'];
		$car = Cars::model()->findByPk($id);
		$car->delete();
		$fileSavePath = Yii::app()->basePath.'/../images/'.$id;
		$this->rmdir_recursive($fileSavePath);

		$cars = cars::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
		$this->render('myCars',array('cars'=>$cars));
	}

	public function actionMyRequests(){

		$userId = Yii::app()->user->id;

		$sql="SELECT cars.make,cars.model,requests.mail,requests.phone,requests.text from requests inner join cars on requests.carId = cars.ID inner join users on cars.UserId = users.ID where users.ID = $userId";
		$connection=Yii::app()->db; 
		$command=$connection->createCommand($sql);
		$requests=$command->query();
	
		$this->render('myRequests',array('requests'=>$requests));
	}

	public function actionMyCars(){

		$cars = cars::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
		$this->render('myCars',array('cars'=>$cars));
	}

	public function actionMyUser()
	{	
		$this->render('myUser');
	}

	public function actionSettings()
	{
		$id = Yii::app()->user->id;

		$model = Users::model()->findByPk($id);

		$this->render('settings',array('model'=>$model));
	}

	public function actionAddCar()
	{
		$model = new Cars;
		if(isset($_POST['Cars']))
		{
	
			$model->attributes=$_POST['Cars'];
           	$uploadedFile=CUploadedFile::getInstance($model,'image');
  			$uploadedFiles=CUploadedFile::getInstancesByName('images');

  			
			if ($model->validate()) {

				$model->userId = Yii::app()->user->id;
				$transaction = Yii::app()->db->beginTransaction();
				try 
				{
				$model->saveData($uploadedFile,$uploadedFiles);
				$transaction->commit();
				Yii::app()->user->returnUrl=array('myUser');
        		$this->redirect(Yii::app()->user->returnUrl);
				}
				catch (Exception $e)
				{
				$transaction->rollBack();
				} 
				
				
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

    
		$config = array( 
      		"base_url" => "http://oravadrattas.azurewebsites.com/protected/extensions/hoauth/hybridauth/",  
		 	"providers" => array (
		    "Google" => array ( 
			    "enabled" => true,
			   	"keys"    => array ( "id" => "672052276846.apps.googleusercontent.com", "secret" => "nZQqEZTY0s5ofOoTsQaPmUEg" ), 
			    "scope"           => "https://www.googleapis.com/auth/userinfo.profile ". // optional
			                        "https://www.googleapis.com/auth/userinfo.email"   , // optional
			    "access_type"     => "offline",   // optional
			    "approval_prompt" => "force",     // optional
		    	//"hd"              => "domain.com" // optional
	    )));
    
	    require_once( "/protected/extensions/hoauth/hybridauth/Hybrid/Auth.php" );
	    
	    $hybridauth = new Hybrid_Auth( $config );
	  
	    $adapter = $hybridauth->authenticate( "Google" );  
	    
	    $user_profile = $adapter->getUserProfile(); 


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

		$model = new RequestForm;

		if(isset($_POST['RequestForm']))
		{
			$model->attributes=$_POST['RequestForm'];
        	if($model->validate()) {
        		$model->carId = $car->ID;
        		$model->request();
        		}
    	}
		$this->render('object',array(
			'car'=>$car,
			'images' =>$car_images,
			'model' =>$model
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
                'actions'=>array('logout', 'addCar','myUser','settings','myRequests','myCars','changeCar'),
                'users'=>array('?'),
            ),
            array('deny',
                'actions'=>array('login', 'registration'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('logout','myUser','addCar','settings','myRequests','myCars','changeCar'),
                'roles'=>array('@'),
            ),
             array('allow',
                'actions'=>array('index','error','object','login','registration'),
                'roles'=>array('*'),
            ),
        );
    }

}