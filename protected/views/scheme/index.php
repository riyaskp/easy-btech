<?php
$this->breadcrumbs=array(
	'Schemes',
);

$this->menu=array(
	array('label'=>'Create Scheme', 'url'=>array('create')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
);
?>

<h1>Schemes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
