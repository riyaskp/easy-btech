<?php

class UniversityController extends Controller
{
     
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'ajaxOnly + createuni',

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
				'actions'=>array('index','view','sylform','qusform','matform'),
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
		$schemeDataProvider=new CActiveDataProvider('Scheme',array(
		'criteria'=>array(
		'condition'=>'uid=:uniId',
		'params'=>array(':uniId'=>$id),
		),
		'pagination'=>array(
		'pageSize'=>10),
		));
		
		
		
		 $dir = 'univers';
         $location=$dir.'/'.$id.'.jpg'; 
     $uploaded = false;
     $modell=new Image();
     if(isset($_POST['Image']))
     {
     $modell->attributes=$_POST['Image'];

     $file=CUploadedFile::getInstance($modell,'file');
     if($modell->validate())
     {
     $uploaded = $file->saveAs($dir.'/'.$file->getName());
	 
     rename($dir.'/'.$file->getName(),$location);
    
	 
	 
	 $this->photo(80,80,$location,$id);
	 
     }

     }
		
		
		
		$this->render('view',array(
		'modell'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
			'model'=>$model,
			  'location'=>$location,
			  
			'schemeDataProvider'=>$schemeDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new University;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['University']))
		{
			$model->attributes=$_POST['University'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->uid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	
	public function actionDialoge()
	{
		$model=new University;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['University']))
		{
			$model->attributes=$_POST['University'];
			if($model->save())
				$this->redirect(array('university/sylform','id'=>$model->uid));

		}
		  Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		
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

		if(isset($_POST['University']))
		{
			$model->attributes=$_POST['University'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->uid));
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
		$dataProvider=new CActiveDataProvider('University');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionSylform()
	{
	 $model=new University;
	 
	 $this->render('sylform',array('model'=>$model));
	
	
	
	
	}

	
	public function actionQusform()
	{
	 $model=new University;
	 
	 $this->render('qusform',array('model'=>$model));
	
	
	
	
	}
	
	
	public function actionMatform()
	{
	 $model=new University;
	 
	 $this->render('matform',array('model'=>$model));
	
	
	
	
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new University('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['University']))
			$model->attributes=$_GET['University'];

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
		$model=University::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='university-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
public function photo($newwidth,$newheight,$loca,$name)
	{
		
				
				$uploadedfile = $loca;
				$src = imagecreatefromjpeg($uploadedfile);
				list($width,$height)=getimagesize($uploadedfile);
				//$newwidth=150;
				//$newheight=180;
				$tmp=imagecreatetruecolor($newwidth,$newheight);
				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
				$filename = $name.'.jpg';
				imagejpeg($tmp,$filename,100);
				
				imagedestroy($src);
				imagedestroy($tmp);
				$newname=$loca.substr($filename,strlen($filename)-4,4);
				rename($filename, $newname);
				return  $newname;	  					
			}
		
	
}
?>