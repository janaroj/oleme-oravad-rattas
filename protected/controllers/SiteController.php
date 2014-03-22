<?php

class SiteController extends Controller
{

	   /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
      'oauth' => array(
        // the list of additional properties of this action is below
        'class'=>'ext.hoauth.HOAuthAction',
        // Yii alias for your user's model, or simply class name, when it already on yii's import path
        // default value of this property is: User
        'model' => 'Users', 
        // map model attributes to attributes of user's social profile
        // model attribute => profile attribute
        // the list of avaible attributes is below
        'attributes' => array(
          'firstName' => 'firstName',
          'lastName' => 'lastName',
          'email' => 'email',
          //'gender' => 'genderShort',
          //'birthday' => 'birthDate',
          // you can also specify additional values, 
          // that will be applied to your model (eg. account activation status)
          //'acc_status' => 1,
        ),
      ),
      // this is an admin action that will help you to configure HybridAuth 
      // (you must delete this action, when you'll be ready with configuration, or 
      // specify rules for admin role. User shouldn't have access to this action!)
      'oauthadmin' => array(
        'class'=>'ext.hoauth.HOAuthAdminAction',
      ),
        );
    }




	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		$carMakes = array();
        $carMakes[] = '(mark)';
		$carColors = array();
		$carColors[] = '(värv)';
		$carYears = array();
		$carYears[] = '(aasta)';
		$carLocations = array();
		$carLocations[] = '(asukoht)';
		$carDates = array();
		$carDates[] = '(lisamise kuupäev)';
		$carPrices = array();
		$carPrices[] = '(hind)';

		$criteria = new CDbCriteria();
		$criteria->limit=8;
		$criteria->offset=0;
		$criteria->order="Date DESC";

		$cars = Cars::model()->findAll($criteria);
		

		foreach ($cars as $car) {
            if(!in_array($car->price, $carPrices)){
              $carPrices[] = $car->price;  
            }

            $date = date("d.m.Y",strToTime($car->Date));
            if(!in_array($date, $carDates)){
              $carDates[] = $date;  
            }

            if(!in_array($car->location, $carLocations)){
              $carLocations[] = $car->location;  
            }

            if(!in_array($car->year, $carYears)){
              $carYears[] = $car->year;  
            }

            if(!in_array($car->color, $carColors)){
            $carColors[] = $car->color;  
          }

          	 if(!in_array($car->make, $carMakes)){
            $carMakes[] = $car->make;
          }

          } 

        sort($carDates);
        sort($carYears);
        sort($carPrices);


        if (isset($_POST['make']) || isset($_POST['color']) || isset($_POST['year']) || isset($_POST['location']) || isset($_POST['dateAdded']) || isset($_POST['price'])) 
        {
        	$car = new Cars;

			if (isset($_POST['make'])) {
				$make = $_POST['make'];
				if ($make>0) {
					$car->make = $carMakes[$make];
				}
			}

			if (isset($_POST['color'])) {
				$color = $_POST['color'];
				if ($color>0) {
					$car->color = $carColors[$color];
				}
			}	

			if (isset($_POST['year'])) {
				$year = $_POST['year'];
				if ($year>0) {
					$car->year = $carYears[$year];
				}
			}

			if (isset($_POST['location'])) {
				$location = $_POST['location'];
				if ($location>0) {
					$car->location = $carLocations[$location];
				}
			}

			if (isset($_POST['dateAdded'])) {
				$dateAdded = $_POST['dateAdded'];
				if ($dateAdded>0) {
					$car->Date = $carDates[$dateAdded];
				}
			}

			if (isset($_POST['price'])) {
				$price = $_POST['price'];
				if ($price>0) {
					$car->price = $carPrices[$price];	
				}
			}

			$cars = $car->search()->getData();
		}

		
		$this->render('index', array(
			'cars'=>$cars,
			'carMakes'=>$carMakes,
			'carColors'=>$carColors,
			'carYears' =>$carYears,
			'carLocations' =>$carLocations,
			'carDates' =>$carDates,
			'carPrices' =>$carPrices
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

   		/* 
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

		*/
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

		$model = new Requests;

		if(isset($_POST['Requests']))
		{
			$model->attributes=$_POST['Requests'];
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

	public function actionAjaxObject() {
		$model = new Requests;
		$model->attributes = $_POST;
		if($model->save()) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0,
				'errors' => CHtml::errorSummary($model)));
		}

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
                'actions'=>array('index','error','object','login','registration','AjaxObject'),
                'roles'=>array('*'),
            ),
        );
    }

}