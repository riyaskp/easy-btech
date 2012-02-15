<?php

/**
 * This is the model class for table "{{university}}".
 *
 * The followings are the available columns in table '{{university}}':
 * @property integer $uid
 * @property string $uname
 */
class University extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return University the static model class
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
		return '{{university}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname', 'required'),
			array('uname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, uname', 'safe', 'on'=>'search'),
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
			'uid' => 'id',
			'uname' => 'University',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('uname',$this->uname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getUniversityList()
	 {
	  // $u1[]='Select university';
	    // $u2[0]='Select university'; 
	     $u2=Chtml::listData(University::model()->findAll(),'uid','uname'); 
        		 
  	  //$u=array_merge($u1,$u2);
	  
	  return ($u2);  
	 }
}