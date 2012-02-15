<?php
$this->breadcrumbs=array(
	'Syllabuses'=>array('index'),
	$model->sylid=>array('view','id'=>$model->sylid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Syllabus', 'url'=>array('index')),
	array('label'=>'Create Syllabus', 'url'=>array('create')),
	array('label'=>'View Syllabus', 'url'=>array('view', 'id'=>$model->sylid)),
	array('label'=>'Manage Syllabus', 'url'=>array('admin')),
);
?>

<h1>Update Syllabus <?php echo $model->sylid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>