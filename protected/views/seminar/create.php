<?php
$this->breadcrumbs=array(
	'Seminars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seminar', 'url'=>array('index')),
	array('label'=>'Manage Seminar', 'url'=>array('admin')),
);
?>

<h1>Create Seminar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>