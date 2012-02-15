<?php
$this->breadcrumbs=array(
	$model->department->scheme->university->uname=>array('/university/view','id'=>$model->department->scheme->uid),
	$model->department->scheme->scheme_name=>array('/scheme/view','id'=>$model->department->schemeid),
     $model->department->dept_name=>array('/department/view','id'=>$model->dptid),
	$model->sem_name,
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'Update Semester', 'url'=>array('update', 'id'=>$model->semid)),
	array('label'=>'Delete Semester', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->semid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
	array('label'=>'Create Subject','url'=>array('/subject/create','sid'=>$model->semid)),
	array('label'=>'Create Syllabus','url'=>array('/syllabus/create','sid'=>$model->semid)),
);
?>

<div class='viewhead'><h1><?php echo $model->sem_name; ?></h1></div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'semid',
		'department',
		'sem_name',
	),
));*/ ?>
<br>
<h2>Subject</h2>
<?php $this->widget('zii.widgets.CListView',array(
         'dataProvider'=>$subjectDataProvider,
		 'itemView'=>'/subject/_view',
		 ));?>
