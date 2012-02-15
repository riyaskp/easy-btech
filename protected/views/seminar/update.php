<?php
$this->breadcrumbs=array(
	'Seminars'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seminar', 'url'=>array('index')),
	array('label'=>'Create Seminar', 'url'=>array('create')),
	array('label'=>'View Seminar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Seminar', 'url'=>array('admin')),
);
?>

<h1>Update Seminar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>