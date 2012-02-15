<?php

$this->breadcrumbs=array(
     $model->scheme->university->uname=>array('/university/view','id'=>$model->scheme->uid),
     $model->scheme->scheme_name=>array('/scheme/view','id'=>$model->schemeid),	
	 $model->dept_name,
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'Update Department', 'url'=>array('update', 'id'=>$model->dptid)),
	array('label'=>'Delete Department', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dptid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Department', 'url'=>array('admin')),
	array('label'=>'Create Semester', 'url'=>array('semester/create','deptid'=>$model->dptid)),
);
?>

<div class='viewhead'><h1><?php echo $model->dept_name; ?></h1></div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dptid',
		'scheme',
		'dept_name',
	),
));*/ ?>
<br>
<h2>Semesters</h2>
<?php $this->widget('zii.widgets.CListView',array(
         'dataProvider'=>$semesterDataProvider,
		 'itemView'=>'/semester/_view',
		 )); ?>