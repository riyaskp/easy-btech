<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->mid,
);

$this->menu=array(
	array('label'=>'List Material', 'url'=>array('index')),
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'Update Material', 'url'=>array('update', 'id'=>$model->mid)),
	array('label'=>'Delete Material', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<h1>View Material #<?php echo $model->mid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mid',
		'subid',
		'material_name',
	),
)); ?>
</br>
<?php $this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>