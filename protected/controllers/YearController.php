<?php

class YearController extends Controller
{
	private $_subject=null;
	//private $_qpaper=null;
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
				'actions'=>array('index','view','test1','qus'),
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
		
		 $dir = Yii::getPathOfAlias('application.uploads');
		 //$dir = 'uploads';

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
		$model=new Year;
		$model->subid=$this->_subject->subid;
	
		$model->qpaper=$this->findQpaper();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Year']))
		{
			$model->attributes=$_POST['Year'];
			if($model->save())
			
				$this->redirect(array('view','id'=>$model->yid));
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

		if(isset($_POST['Year']))
		{
			$model->attributes=$_POST['Year'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->yid));
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
		$dataProvider=new CActiveDataProvider('Year');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Year('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Year']))
			$model->attributes=$_GET['Year'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	public function actionTest1()
	{
	    $id=$_REQUEST['subid'];
		
		
		$criteria = new CDbCriteria();
        $criteria->condition ='subid=:subId';
        $criteria->params = array(':subId'=>$id);
		
	    $year=Year::model()->findAll($criteria);
		$this->renderPartial('_qusform',array(
		    'year'=>$year,
			
			
		)); 
		
		
		}
		
		
		public function actionQus()
	{
	    $id=$_REQUEST['yid'];
		
		$dir = Yii::getPathOfAlias('application.uploads');
           
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
        		   
		$this->renderPartial('_qus',array(
		    'id'=>$id,
			'modell'=>$modell,
			 'uploaded' => $uploaded,
            'dir1'=>$dir,
		)); 
		
		
		}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Year::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='year-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function findQpaper()
	{
		$_qpaper=Year::model()->findAll(array(
        'order'=>'yid DESC',
        'limit'=>1,
         ));
		 $qpaper=$_qpaper[0]->yid;
		 $qpaper=(int)$qpaper+1;
		 return $qpaper;
	}
	
   public function actionQpaper()
   {
	   
	   $dir = Yii::getPathOfAlias('application.uploads');

     $uploaded = false;
     $model=new Upload();
     if(isset($_POST['Upload']))
     {
     $model->attributes=$_POST['Upload'];

     $file=CUploadedFile::getInstance($model,'file');
     if($model->validate())
     {
     $uploaded = $file->saveAs($dir.'/'.$file->getName());
     rename($dir.'/'.$file->getName(),$dir.'/2.pdf');
     }

     }
     $this->render('index', array(
     'model' => $model,
     'uploaded' => $uploaded,
     'dir' => $dir,
     ));

   }
	
}
