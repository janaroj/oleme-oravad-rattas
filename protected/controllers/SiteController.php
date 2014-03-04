<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$cars = Cars::model()->findAll();

		$this->render('index', array(
			'cars'=>$cars
		));	
	}

	public function actionObject()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('make','Lada');

		$car = Cars::model()->findAll($criteria);

		print_r($car);



		$this->render('object',array(
			'car'=>$car
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

	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}