<?php
$this->breadcrumbs=array(
	'Syllabuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Syllabus', 'url'=>array('index')),
	array('label'=>'Manage Syllabus', 'url'=>array('admin')),
);
?>

<h1>Create Syllabus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>