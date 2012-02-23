<?php

class SchemeController extends Controller
{    

    private $_university=null;
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	 
	 public function loadUniversity($uid)
	 {
		 if($this->_university===null)
		 {
	      $this->_university=University::model()->findbyPk($uid);
		  if($this->_university===null)
		  { 
		   throw new CHttpException(404,'The requested university does not exist.');
		  }
	     }
		 return $this->_university;
	 }
	 
	 
	 public function filterUniversityContext($filterchain)
	 {
		 $uid=null;
		 if(isset($_GET['id']))
		 $uid=$_GET['id'];
		 if(isset($_POST['id']))
		 $uid=$_POST['id'];
		 if(isset($_GET['x']))
		 $uid=$_GET['x'];
		 if(isset($_POST['x']))
		 $uid=$_POST['x'];
		 $this->loadUniversity($uid);
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
			'universityContext + create, dialoge'
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
    public function actionTest()
	{
	    $uid=$_REQUEST['uid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='uid=:uniId';
        $criteria->params = array(':uniId'=>$uid);
		
	    $schemes=Scheme::model()->findAll($criteria);
		
		/*
		 echo "<pre>"; 
		print_r($schemes);
		echo "</pre>";*/ 
		 
         $this->renderPartial('_sylform',array(
		     'uid'=>'$uid',
			'schemes'=>$schemes,
			
		),
		false, // whether it should print or return the buffered output
  true // "processOutput" - false by default, this should output your JS now
  ); 
      
		
	  /*echo '<pre>';


print_r ($schemes);

    echo '</pre>';
	  
*/
     /* $dataProvider=new CActiveDataProvider('Model',
       array(
       'criteria'=>$criteria
      )
      );*/
		/*'pagination'=>array(
		'pageSize'=>10),*/
		
	  /*if(isset($_REQUEST['uid']))
	   {
        $uid=$_GET['uid'];
	   }*/
	 
	}
	
	
	public function actionTest1()
	{
	    $uid=$_REQUEST['uid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='uid=:uniId';
        $criteria->params = array(':uniId'=>$uid);
		
	    $schemes=Scheme::model()->findAll($criteria);
		
		/*
		 echo "<pre>"; 
		print_r($schemes);
		echo "</pre>";*/ 
		 
         $this->renderPartial('_qusform',array(
			'schemes'=>$schemes,
		),
		false, // whether it should print or return the buffered output
  true // "processOutput" - false by default, this should output your JS now
  );
      }
	  
	  
	  public function actionMat()
	{
	    $uid=$_REQUEST['uid'];
		$criteria = new CDbCriteria();
        $criteria->condition ='uid=:uniId';
        $criteria->params = array(':uniId'=>$uid);
		
	    $schemes=Scheme::model()->findAll($criteria);
		
		/*
		 echo "<pre>"; 
		print_r($schemes);
		echo "</pre>";*/ 
		 
         $this->renderPartial('_matform',array(
			'schemes'=>$schemes,
		),
		false, // whether it should print or return the buffered output
  true // "processOutput" - false by default, this should output your JS now
  ); 
  
      }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		//$model->university=$model->university->uname;
		
		$departmentDataProvider=new CActiveDataProvider('Department',array(
		'criteria'=>array(
		'condition'=>'schemeid=:schemeId',
		'params'=>array(':schemeId'=>$id),
		),
		'pagination'=>array(
		'pageSize'=>10),
		));
		
		$this->render('view',array(
			'model'=>$model,
			
			'departmentDataProvider'=>$departmentDataProvider,
			
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Scheme;
		$model->uid=$this->_university->uid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Scheme']))
		{
			$model->attributes=$_POST['Scheme'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->schemeid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionDialoge()
	{
		$model=new Scheme;
		$model->uid=$this->_university->uid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Scheme']))
		{
			$model->attributes=$_POST['Scheme'];
			if($model->save())
				$this->redirect(array('university/sylform','id'=>$model->schemeid));
		}
           Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		$this->renderPartial('/scheme/create',array(
			'model'=>$model,
			
		),
		false, // whether it should print or return the buffered output
  true // "processOutput" - false by default, this should output your JS now
		);
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

		if(isset($_POST['Scheme']))
		{
			$model->attributes=$_POST['Scheme'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->schemeid));
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
		$dataProvider=new CActiveDataProvider('Scheme');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Scheme('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Scheme']))
			$model->attributes=$_GET['Scheme'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Scheme::model()->with('university')->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='scheme-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
