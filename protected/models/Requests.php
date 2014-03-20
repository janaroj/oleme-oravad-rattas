<?php

/**
 * This is the model class for table "requests".
 *
 * The followings are the available columns in table 'requests':
 * @property integer $ID
 * @property integer $carId
 * @property string $name
 * @property string $mail
 * @property string $phone
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Cars $car
 */
class Requests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//For form
			array('mail, phone, name, text', 'required'),
			array('mail','email'),
			array('phone','numerical'),

			array('carId', 'numerical', 'integerOnly'=>true),
			array('name, mail, phone', 'length', 'max'=>45),
			array('text', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, carId, name, mail, phone, text', 'safe', 'on'=>'search'),
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
			'car' => array(self::BELONGS_TO, 'Cars', 'carId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'carId' => 'Car',
			'name' => 'Name',
			'mail' => 'Mail',
			'phone' => 'Phone',
			'text' => 'Text',
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
		$criteria->compare('carId',$this->carId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Requests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function request()
	{		
		$request = new Requests;
		$request->carId = $this->carId;
		$request->name = $this->name;
		$request->text = $this->text;
		$request->phone = $this->phone;
		$request->mail = $this->mail;

		$request->save();

	}
}
