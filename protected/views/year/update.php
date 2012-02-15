<?php
$this->breadcrumbs=array(
	'Years'=>array('index'),
	$model->yid=>array('view','id'=>$model->yid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Year', 'url'=>array('index')),
	array('label'=>'Create Year', 'url'=>array('create')),
	array('label'=>'View Year', 'url'=>array('view', 'id'=>$model->yid)),
	array('label'=>'Manage Year', 'url'=>array('admin')),
);
?>

<h1>Update Year <?php echo $model->yid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>