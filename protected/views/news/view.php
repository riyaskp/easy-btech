<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->nid)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>View News #<?php echo $model->nid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nid',
		'title',
		'description',
		'url',
	),
)); ?>
</br>
<?php $this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>
