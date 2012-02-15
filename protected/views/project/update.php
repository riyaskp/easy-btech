<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name=>array('view','id'=>$model->pid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'View Project', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<h1>Update Project <?php echo $model->pid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>