<?php

/**
 * This is the model class for table "{{syllabus}}".
 *
 * The followings are the available columns in table '{{syllabus}}':
 * @property integer $sylid
 * @property integer $semid
 * @property string $syl_name
 */
class Syllabus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Syllabus the static model class
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
		return '{{syllabus}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semid, syl_name', 'required'),
			array('semid', 'numerical', 'integerOnly'=>true),
			array('syl_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sylid, semid, syl_name', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sylid' => 'Sylid',
			'semid' => 'Semid',
			'syl_name' => 'Syl Name',
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

		$criteria->compare('sylid',$this->sylid);
		$criteria->compare('semid',$this->semid);
		$criteria->compare('syl_name',$this->syl_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}