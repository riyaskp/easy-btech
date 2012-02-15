<?php

/**
 * This is the model class for table "{{semester}}".
 *
 * The followings are the available columns in table '{{semester}}':
 * @property integer $semid
 * @property integer $dptid
 * @property string $sem_name
 */
class Semester extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Semester the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{semester}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dptid, sem_name', 'required'),
			array('dptid', 'numerical', 'integerOnly'=>true),
			array('sem_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('semid, dptid, sem_name', 'safe', 'on'=>'search'),
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
		'department'=>array(self::BELONGS_TO,'Department','dptid'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'semid' => 'Semid',
			'dptid' => 'Dptid',
			'sem_name' => 'Semester',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('semid',$this->semid);
		$criteria->compare('dptid',$this->dptid);
		$criteria->compare('sem_name',$this->sem_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}