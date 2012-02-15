<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->nid),
	'Update',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->nid)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>Update News <?php echo $model->nid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>