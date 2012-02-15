<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scheme', 'url'=>array('index')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
);
?>

<h1>Create Scheme</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>