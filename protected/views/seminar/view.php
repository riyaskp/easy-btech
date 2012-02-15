<?php
$this->breadcrumbs=array(
	'Seminars'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Seminar', 'url'=>array('index')),
	array('label'=>'Create Seminar', 'url'=>array('create')),
	array('label'=>'Update Seminar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Seminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seminar', 'url'=>array('admin')),
);
?>

<div class='viewhead'><h1><?php echo $model->name; ?></h1></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		
		'description',
	),
)); ?>
</br>

<?php if(Yii::app()->user->isGuest)
{
	     $dir1 = Yii::getPathOfAlias('application.seminars');
		 $dir=$dir1.'\\'.$model->id.'.pdf';
		 echo CHtml::link(CHtml::encode("View"),Yii::app()->assetManager->publish($dir),array("target"=>'_blank'));
		 
		 
}
		
		?>
</br>
<?php 
if(!Yii::app()->user->isGuest) 

$this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>