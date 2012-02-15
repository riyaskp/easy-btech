<?php

class SyllabusController extends Controller
{

       private $_semester=null;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	 
	 
	 
	 public function loadSemester($semId)
	 {
		 if($this->_semester===null)
		 {
	      $this->_semester=Semester::model()->findbyPk($semId);
		  if($this->_semester===null)
		  { 
		   throw new CHttpException(404,'The requested Semester does not exist.');
			  }
			 }
		 return $this->_semester;
	 }
	 
	 
	 public function filterSemesterContext($filterchain)
	 {
		 $semId=null;
		 if(isset($_GET['sid']))
		 $semId=$_GET['sid'];
		 if(isset($_POST['sid']))
		 $semId=$_POST['sid'];
		 $this->loadSemester($semId);
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
			'semesterContext + create'
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
				'actions'=>array('index','view','test'),
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
	
	 $dir = Yii::getPathOfAlias('application.syllabus');

     $uploaded = false;
     $modell=new Upload();
     if(isset($_POST['Upload']))
     {
     $modell->attributes=$_POST['Upload'];

     $file=CUploadedFile::getInstance($modell,'file');
     if($modell->validate())
     {
     $uploaded = $file->saveAs($dir.'/'.$file->getName());
    rename($dir.'/'.$file->getName(),$dir.'/'.$id.'.pdf');
     }

     }
		$this->render('view',array(
		'modell'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Syllabus;
		$model->semid=$this->_semester->semid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Syllabus']))
		{
			$model->attributes=$_POST['Syllabus'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->sylid));
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

		if(isset($_POST['Syllabus']))
		{
			$model->attributes=$_POST['Syllabus'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->sylid));
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
		$dataProvider=new CActiveDataProvider('Syllabus');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Syllabus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Syllabus']))
			$model->attributes=$_GET['Syllabus'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	 public function actionTest()
	{
	    $id=$_REQUEST['semid'];
		
		$dir1 = Yii::getPathOfAlias('application.syllabus');
		
		$uploaded = false;
     $modell=new Upload();
     if(isset($_POST['Upload']))
     {
     $modell->attributes=$_POST['Upload'];

     $file=CUploadedFile::getInstance($modell,'file');
     if($modell->validate())
     {
     $uploaded = $file->saveAs($dir1.'/'.$file->getName());
    rename($dir1.'/'.$file->getName(),$dir1.'/'.$id.'.pdf');
     }

     }
		
		$criteria = new CDbCriteria();
        $criteria->condition ='semid=:semId';
        $criteria->params = array(':semId'=>$id);
		
	    $syllabus=Syllabus::model()->findAll($criteria);
		$this->renderPartial('_sylform',array(
		    'syllabus'=>$syllabus,
			'modell'=>$modell,
			 'uploaded' => $uploaded,
			
			'dir1'=>$dir1,
		)); 
		
		
		}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Syllabus::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='syllabus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
