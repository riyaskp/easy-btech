<?php
$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->uname,
);

$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'Update University', 'url'=>array('update', 'id'=>$model->uid)),
	array('label'=>'Delete University', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage University', 'url'=>array('admin')),
	array('label'=>'Create Scheme', 'url'=>array('scheme/create','id'=>$model->uid)),
);
?>

<div class='viewhead'><h1><?php echo $model->uname; ?></h1></div>


<?php if(!Yii::app()->user->isGuest)
		 
		  $this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>
<br>

<h2>Schemes</h2>
<?php $this->widget('zii.widgets.CListView',array(
         'dataProvider'=>$schemeDataProvider,
		 //'viewData' => array( 'bread' => $model->uname ),
		 'itemView'=>'/scheme/_view',
		 )); ?>

