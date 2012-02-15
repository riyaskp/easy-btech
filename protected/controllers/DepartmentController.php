<?php

class DepartmentController extends Controller
{
	private $_scheme=null;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	 public function loadScheme($schemid)
	 {
		 if($this->_scheme===null)
		 {
	      $this->_scheme=Scheme::model()->findbyPk($schemid);
		  if($this->_scheme===null)
		  { 
		   throw new CHttpException(404,'The requested scheme does not exist.');
			  }
			 }
		 return $this->_scheme;
	 }
	 
	 
	 public function filterSchemeContext($filterchain)
	 {
		 $schemid=null;
		 if(isset($_GET['sid']))
		 $schemid=$_GET['sid'];
		 if(isset($_POST['sid']))
		 $schemid=$_POST['sid'];
		 $this->loadScheme($schemid);
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
		'schemeContext + create',
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
				'actions'=>array('create','update'),
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
		//$model->scheme=$model->scheme->scheme_name;
		$semesterDataProvider=new CActiveDataProvider('Semester',array(
		'criteria'=>array(
		'condition'=>'dptid=:deptId',
		'params'=>array(':deptId'=>$id),
		),
		'pagination'=>array(
		'pageSize'=>10),
		));
		
		
		$this->render('view',array(
			'model'=>$model,
			'semesterDataProvider'=>$semesterDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Department;
        $model->schemeid=$this->_scheme->schemeid;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->dptid));
		}

		$this->render('create',array(
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

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->dptid));
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
		$dataProvider=new CActiveDataProvider('Department');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	 public function actionTest()
	{
	    $id=$_REQUEST['schemeid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='schemeid=:schemeId';
        $criteria->params = array(':schemeId'=>$id);
		
	    $departs=Department::model()->findAll($criteria);
		$this->renderPartial('_sylform',array(
			'departs'=>$departs,
		)); 
		
		
		}
		public function actionTest1()
	{
	    $id=$_REQUEST['schemeid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='schemeid=:schemeId';
        $criteria->params = array(':schemeId'=>$id);
		
	    $departs=Department::model()->findAll($criteria);
		$this->renderPartial('_qusform',array(
			'departs'=>$departs,
		)); 
		
		
		}
		
		public function actionMat()
	{
	    $id=$_REQUEST['schemeid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='schemeid=:schemeId';
        $criteria->params = array(':schemeId'=>$id);
		
	    $departs=Department::model()->findAll($criteria);
		$this->renderPartial('_matform',array(
			'departs'=>$departs,
		)); 
		
		
		}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Department::model()->with('scheme')->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
