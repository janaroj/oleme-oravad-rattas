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
	public function actionAjaxPictures() {
		$id = $_GET['id'];

		$criteria = new CDbCriteria();
		$criteria->condition="carId=:id";
		$criteria->params = array(":id" => $id );
		
		$model = CarPictures::model()->findAll($criteria);
	
		//$model->attributes = $_GET;
			echo json_encode(array('pictures' => $data));
		//$this->_sendResponse(200, NJSON::encode($data,true));
		/*
		//Pagination	
        $item_count = Cars::model()->count($criteria);
        //$item_count = count($cars);
                
        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!
        //END

        'model'=> Cars::model()->findAll($criteria), // must be the same as $item_count
	*/
	}

	public function actionAjaxIndex() {
	header('Content-Type: application/json');
	
		$page = (isset($_GET['page']) ? $_GET['page'] : 1 );

		$dataprovider = new CActiveDataProvider('Cars',array(
			'criteria' => array(
				'order' => 'Date DESC',
			),
			'pagination' => array(
				'pageSize' => '6',
				'currentPage' => $page
			), 
		));

		echo CJSON::encode($dataprovider->getData());

	}

	
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
		$criteria->order="Date DESC";
		
		$cars = Cars::model()->findAll($criteria);
		
		//Otsingukastids
		foreach ($cars as $car) {
            if(!in_array($car->price, $carPrices)){
              $carPrices[] = $car->price;  
            }

            if(!in_array(ucwords($car->location), $carLocations)){
              $carLocations[] = ucwords($car->location);  
            }

            if(!in_array($car->year, $carYears)){
              $carYears[] = $car->year;  
            }

            if(!in_array(ucwords($car->color), $carColors)){
            $carColors[] = ucwords($car->color);  
          }

          	 if(!in_array(ucwords($car->make), $carMakes)){
            $carMakes[] = ucwords($car->make);
          }

        } 

        sort($carDates);
        sort($carYears);
        sort($carPrices);
        //Optionite END
			
		$make = (isset($_POST['make']) ? $_POST['make']:0);
		$color = (isset($_POST['color']) ? $_POST['color']:0);
		$year = (isset($_POST['year']) ? $_POST['year']:0);
		$location = (isset($_POST['location']) ? $_POST['location']:0);
		$price = (isset($_POST['price']) ? $_POST['price']:0);
		
		$finalprms = array();

		if ($make>0) {
        	$criteria->condition="make=:make";
			$criteria->params = array(':make' => $carMakes[$make] );
			array_push($finalprms, ':make' => $carMakes[$make]);
		}

		if ($color>0) {
			$criteria->condition="color=:color";
			$criteria->params = array(':color' => $carColors[$color] );
			array_push($finalprms, ':color' => $carColors[$color]);

		}
	
		if ($year>0) {
			$criteria->condition="year=:year";
			$criteria->params = array(':year' => $carYears[$year] );
			array_push($finalprms, ':year' => $carYears[$year]);

		}
	
		if ($location>0) {
			$criteria->condition="location=:location";
			$criteria->params = array(':location' => $carLocations[$location] );
			array_push($finalprms, ':location' => $carLocations[$location]);
		
		}
	
	
		if ($price>0) {
			$criteria->condition="price=:price";
			$criteria->params = array(':price' => $carPrices[$price] );
			array_push($finalprms, ':price' => $carPrices[$price]);
		
		}

		$criteria->params = $finalprms;

		$count=Cars::model()->count($criteria);
		$pages=new CPagination($count);

		    // results per page
		$pages->pageSize=6;
		$pages->applyLimit($criteria);
		$model=Cars::model()->findAll($criteria);

	
		$this->render('index', array(
			'model' => $model,
			'carMakes'=>$carMakes,
			'carColors'=>$carColors,
			'carYears' =>$carYears,
			'carLocations' =>$carLocations,
			'carDates' =>$carDates,
			'carPrices' =>$carPrices,
			'pages' => $pages

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
		
		$criteria = new CDbCriteria();
		$criteria->condition="carId=:id";
		$criteria->params = array(':id' => $id );

		$images = CarPictures::model()->findAll($criteria);

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
				catch (Exception $e) {
					$transaction->rollBack();
				} 
        	}
			

		}

		$this->render('changeCar',array('model'=>$model,'images'=>$images));
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

	public function actionDeleteCarPicture() { 
		$id = $_GET['pictureId'];
		$carPicture = CarPictures::model()->findByPk($id);
		$carPicture->delete();
		$fileSavePath = Yii::app()->basePath.'/../images/'.$id;
		$this->rmdir_recursive($fileSavePath);
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	public function actionMyRequests(){
		$this->layout='user';	
		
		$userId = Yii::app()->user->id;

		$sql="SELECT cars.make,cars.model,requests.ID,requests.email,requests.phone,requests.text from requests inner join cars on requests.carId = cars.ID inner join users on cars.UserId = users.ID where users.ID = $userId";
		$connection=Yii::app()->db; 
		$command=$connection->createCommand($sql);
		$requests=$command->query();
	
		$this->render('myRequests',array('requests'=>$requests));
	}


	public function actionDeleteRequest(){
		$id = $_GET['requestId'];
		$request = Requests::model()->findByPk($id);
		$request->delete();

		$this->redirect(array('myRequests'));

	}

	public function actionMyCars() {
		$this->layout='user';
		$cars = Cars::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
		$this->render('myCars',array('cars'=>$cars));
	}

	public function actionMyUser() {
		$this->layout='user';	
		$this->render('myUser');
	}

	public function actionSettings() {
		$this->layout='user';	
		
		$id = Yii::app()->user->id;
		$model = Users::model()->findByPk($id);
		if (Yii::app()->request->isPostRequest) {
			$model->attributes = $_POST['Users'];
			if ($model->validate()) {
				$model->save();
			}

		}
		$this->render('settings',array('model'=>$model));
	}
	public function actionDeleteUser() {
		$id = Yii::app()->user->id;
		$model = Users::model()->findByPk($id);
		$model->delete();
		$this->redirect(array("logout"));
	}

	public function actionAddCar() {
		$this->layout='user';	
		
		$model = new Cars;
		if(isset($_POST['Cars'])) {

			$model->attributes=$_POST['Cars'];
           	$uploadedFile=CUploadedFile::getInstance($model,'image');
  			$uploadedFiles=CUploadedFile::getInstancesByName('images');
  			
			if ($model->validate()) {

				$model->userId = Yii::app()->user->id;
				$transaction = Yii::app()->db->beginTransaction();
				try {
					$model->saveData($uploadedFile,$uploadedFiles);
					$transaction->commit();
					Yii::app()->user->returnUrl=array('myUser');
	        		$this->redirect(Yii::app()->user->returnUrl);
				}
				catch (Exception $e) {
				$transaction->rollBack();
				}
			}
		}
		$this->render('addCar',array('model'=>$model));
	}
	

	public function actionRegistration() {
		$this->layout='user';
		
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

	public function actionLogin() {
   		$this->layout='user';	
		
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

	public function actionIsActive(){
    	header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
        echo "retry: 3000\n"; // Optional. We tell the browser to retry after 3 seconds
        $id = Yii::app()->user->id;
		$model = Users::model()->findByPk($id);
		
		$minutesNotActive = 10;

		if ($model->isMinutesPassed($minutesNotActive)) {
			echo "data:";
	   		echo "Sa pole juba tervelt "; echo $minutesNotActive; echo " minutit aktiivne olnud, kas soovid välja logida";
	   		$userId = Yii::app()->user->id;
      		$sql="UPDATE users SET lastActive=NOW() WHERE users.id = $userId";
      		Yii::app()->db->createCommand($sql)->query();
        }
     
        
		echo "\n\n";
        flush();

    }

	public function actionLogout(){
		$this->layout='user';	
				
		Yii::app()->user->logout();
		Yii::app()->user->clearStates();
		$_SESSION = array();
		$this->redirect(array("index"));
	}

	public function actionObject() {
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
			echo json_encode(array('success' => 1,
					'errors' => "Vormi saatmine õnnestus"));

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
                'actions'=>array('index','error','object','login','registration','AjaxObject','getMessage'),
                'roles'=>array('*'),
            ),
        );
    }

}