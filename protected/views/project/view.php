<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
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
	     $dir1 = Yii::getPathOfAlias('application.projects');
		 $dir=$dir1.'\\'.$model->pid.'.pdf';
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
