<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->dptid=>array('view','id'=>$model->dptid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'View Department', 'url'=>array('view', 'id'=>$model->dptid)),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<h1>Update Department <?php echo $model->dptid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>