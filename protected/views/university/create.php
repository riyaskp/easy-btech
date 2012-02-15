<?php
$this->breadcrumbs=array(
	'Universities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List University', 'url'=>array('index')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
?>

<h1>Create University</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>