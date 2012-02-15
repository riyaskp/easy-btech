<?php
class Upload extends CFormModel
{
public $file;
public function rules()
	{
	return array(array('file', 'file', 'types'=>'pdf'),);
	}

public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		//'year'=>array(self::BELONGS_TO,'Semester','semid'),
		);
	}


}
?>