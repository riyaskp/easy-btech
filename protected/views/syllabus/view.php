<?php
$this->breadcrumbs=array(
	'Syllabuses'=>array('index'),
	$model->sylid,
);

$this->menu=array(
	array('label'=>'List Syllabus', 'url'=>array('index')),
	array('label'=>'Create Syllabus', 'url'=>array('create')),
	array('label'=>'Update Syllabus', 'url'=>array('update', 'id'=>$model->sylid)),
	array('label'=>'Delete Syllabus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sylid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Syllabus', 'url'=>array('admin')),
);
?>

<h1>View Syllabus #<?php echo $model->sylid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sylid',
		'semid',
		'syl_name',
	),
)); ?>
</br>
<?php $this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   )) ?>
