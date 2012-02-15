<?php
$this->breadcrumbs=array(
	'Syllabuses',
);

$this->menu=array(
	array('label'=>'Create Syllabus', 'url'=>array('create')),
	array('label'=>'Manage Syllabus', 'url'=>array('admin')),
);
?>

<h1>Syllabuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
