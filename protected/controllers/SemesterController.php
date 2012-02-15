<?php

class SemesterController extends Controller
{ 
     private $_department=null;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	 public function loadDepartment($departid)
	 {
		 if($this->_department===null)
		 {
	      $this->_department=Department::model()->findbyPk($departid);
		  if($this->_department===null)
		  { 
		   throw new CHttpException(404,'The requested Department does not exist.');
			  }
			 }
		 return $this->_department;
	 }
	 
	 
	 public function filterDepartmentContext($filterchain)
	 {
		 $departid=null;
		 if(isset($_GET['deptid']))
		 $departid=$_GET['deptid'];
		 if(isset($_POST['deptid']))
		 $departid=$_POST['deptid'];
		 $this->loadDepartment($departid);
		 $filterchain->run();		 
	 }
	
	
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'departmentContext + create',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','test','test1','mat'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dialoge'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		//$model->department=$model->department->dept_name;
		$subjectDataProvider=new CActiveDataProvider('Subject',array(
		'criteria'=>array(
		'condition'=>'semid=:semId',
		'params'=>array(':semId'=>$id),
		),
		'pagination'=>array(
		'pageSize'=>10),
		
		));
		
		
		$this->render('view',array(
			'model'=>$model,
		'subjectDataProvider'=>$subjectDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Semester;
		$model->dptid=$this->_department->dptid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Semester']))
		{
			$model->attributes=$_POST['Semester'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->semid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionDialoge()
	{
		$model=new Semester;
		$model->dptid=$this->_department->dptid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Semester']))
		{
			$model->attributes=$_POST['Semester'];
			if($model->save())
				$this->redirect(array('university/sylform','id'=>$model->semid));
		}

		$this->renderPartial('create',array(
			'model'=>$model,
		));
	}

	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Semester']))
		{
			$model->attributes=$_POST['Semester'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->semid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Semester');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Semester('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Semester']))
			$model->attributes=$_GET['Semester'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	 public function actionTest()
	{
	    $id=$_REQUEST['dptid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='dptid=:dptId';
        $criteria->params = array(':dptId'=>$id);
		
	    $semester=Semester::model()->findAll($criteria);
		$this->renderPartial('_sylform',array(
			'semester'=>$semester,
		)); 
		
		
		}
		
		public function actionTest1()
	{
	    $id=$_REQUEST['dptid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='dptid=:dptId';
        $criteria->params = array(':dptId'=>$id);
		
	    $semester=Semester::model()->findAll($criteria);
		$this->renderPartial('_qusform',array(
			'semester'=>$semester,
		)); 
		
		
		}
		public function actionMat()
	{
	    $id=$_REQUEST['dptid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='dptid=:dptId';
        $criteria->params = array(':dptId'=>$id);
		
	    $semester=Semester::model()->findAll($criteria);
		$this->renderPartial('_matform',array(
			'semester'=>$semester,
		)); 
		
		
		}
		
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Semester::model()->with('department')->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='semester-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
