<?php
$this->breadcrumbs=array(
	'Semesters'=>array('index'),
	$model->semid=>array('view','id'=>$model->semid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'View Semester', 'url'=>array('view', 'id'=>$model->semid)),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h1>Update Semester <?php echo $model->semid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>