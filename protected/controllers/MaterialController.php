<?php

class MaterialController extends Controller
{
     private $_subject=null;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	 
	  public function loadSubject($subId)
	 {
		 if($this->_subject===null)
		 {
	      $this->_subject=Subject::model()->findbyPk($subId);
		  if($this->_subject===null)
		  { 
		   throw new CHttpException(404,'The requested Subject does not exist.');
			  }
			 }
		 return $this->_subject;
	 }
	 
	 
	 public function filterSubjectContext($filterchain)
	 {
		 $subId=null;
		 if(isset($_GET['subid']))
		 $subId=$_GET['subid'];
		 if(isset($_POST['subid']))
		 $subId=$_POST['subid'];
		 $this->loadSubject($subId);
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
			'subjectContext + create'
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
				'actions'=>array('index','view','mat','mater'),
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
	    $dir = Yii::getPathOfAlias('application.materials');

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
		$model=new Material;
		$model->subid=$this->_subject->subid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Material']))
		{
			$model->attributes=$_POST['Material'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->mid));
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

		if(isset($_POST['Material']))
		{
			$model->attributes=$_POST['Material'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->mid));
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
		$dataProvider=new CActiveDataProvider('Material');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Material('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Material']))
			$model->attributes=$_GET['Material'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	
	public function actionMat()
	{
	    $id=$_REQUEST['subid'];
		
		
		$criteria = new CDbCriteria();
        $criteria->condition ='subid=:subId';
        $criteria->params = array(':subId'=>$id);
		
	    $material=Material::model()->findAll($criteria);
		$this->renderPartial('_matform',array(
		    'material'=>$material,
			
			
		)); 
		
		
		}
		
		
		public function actionMater()
	{
	    $id=$_REQUEST['mid'];
		$dir1 = Yii::getPathOfAlias('application.materials');
		
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
		
		
		
		$this->renderPartial('_mat',array(
		    'id'=>$id,
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
		$model=Material::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='material-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
