<?php
$this->breadcrumbs=array(
     $model->university->uname=>array('/university/view','id'=>$model->uid),
	
	
	$model->scheme_name,
);

$this->menu=array(
	array('label'=>'List Scheme', 'url'=>array('index')),
	array('label'=>'Create Scheme', 'url'=>array('create')),
	array('label'=>'Update Scheme', 'url'=>array('update', 'id'=>$model->schemeid)),
	array('label'=>'Delete Scheme', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->schemeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
	array('label'=>'Create Department', 'url'=>array('department/create','sid'=>$model->schemeid)),
);
?>

<div class='viewhead'><h1><?php echo $model->scheme_name; ?></h1></div>
 

<?php
  /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'schemeid',
		'uid',
		'scheme_name',
	),
));*/ 
?>
<br>
<h2>Departments</h2>
<?php $this->widget('zii.widgets.CListView',array(
         'dataProvider'=>$departmentDataProvider,
		 'itemView'=>'/department/_view',
		 )); ?>
