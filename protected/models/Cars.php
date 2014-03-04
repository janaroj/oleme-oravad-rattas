<?php

/**
 * This is the model class for table "cars".
 *
 * The followings are the available columns in table 'cars':
 * @property integer $ID
 * @property integer $userId
 * @property string $make
 * @property string $model
 * @property string $location
 * @property integer $year
 * @property string $color
 * @property string $status
 * @property string $text
 * @property integer $price
 *
 * The followings are the available model relations:
 * @property CarPictures[] $carPictures
 * @property Users $user
 * @property Requests[] $requests
 */
class Cars extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, year, price', 'numerical', 'integerOnly'=>true),
			array('make, model, location, color, status, text', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, userId, make, model, location, year, color, status, text, price', 'safe', 'on'=>'search'),
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
			'carPictures' => array(self::HAS_MANY, 'CarPictures', 'carId'),
			'user' => array(self::BELONGS_TO, 'Users', 'userId'),
			'requests' => array(self::HAS_MANY, 'Requests', 'carId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'userId' => 'User',
			'make' => 'Make',
			'model' => 'Model',
			'location' => 'Location',
			'year' => 'Year',
			'color' => 'Color',
			'status' => 'Status',
			'text' => 'Text',
			'price' => 'Price',
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
		$criteria->compare('userId',$this->userId);
		$criteria->compare('make',$this->make,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cars the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
