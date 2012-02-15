<?php
$this->breadcrumbs=array(
	'Semesters',
);

$this->menu=array(
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h1>Semesters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
