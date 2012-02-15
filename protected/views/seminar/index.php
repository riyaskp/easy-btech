<?php
$this->breadcrumbs=array(
	'Topics',
);

$this->menu=array(
	array('label'=>'Create Seminar', 'url'=>array('create')),
	array('label'=>'Manage Seminar', 'url'=>array('admin')),
);
?>

<h1>Topics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
