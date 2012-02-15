<?php

/**
 * This is the model class for table "{{subject}}".
 *
 * The followings are the available columns in table '{{subject}}':
 * @property integer $subid
 * @property integer $semid
 * @property integer $sub_name
 */
class Subject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subject the static model class
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
		return '{{subject}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semid, sub_name', 'required'),
			array('semid', 'numerical', 'integerOnly'=>true),
			array('sub_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subid, semid, sub_name', 'safe', 'on'=>'search'),
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
		'semester'=>array(self::BELONGS_TO,'Semester','semid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subid' => 'Subid',
			'semid' => 'Semid',
			'sub_name' => 'Sub Name',
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

		$criteria->compare('subid',$this->subid);
		$criteria->compare('semid',$this->semid);
		$criteria->compare('sub_name',$this->sub_name);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}