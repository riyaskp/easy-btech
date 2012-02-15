<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Update Events', 'url'=>array('update', 'id'=>$model->eid)),
	array('label'=>'Delete Events', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>View Events #<?php echo $model->eid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eid',
		'title',
		'description',
		'date',
		'link',
	),
)); ?>
</br>
<?php $this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>
