<?php
$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'View University', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
?>

<h1>Update University <?php echo $model->uid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>