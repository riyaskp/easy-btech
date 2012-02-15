<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->mid=>array('view','id'=>$model->mid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Material', 'url'=>array('index')),
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'View Material', 'url'=>array('view', 'id'=>$model->mid)),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<h1>Update Material <?php echo $model->mid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>