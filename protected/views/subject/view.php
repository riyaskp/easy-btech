<?php
$this->breadcrumbs=array(
$model->semester->department->scheme->university->uname=>array('/university/view','id'=>$model->semester->department->scheme->uid),
	$model->semester->department->scheme->scheme_name=>array('/scheme/view','id'=>$model->semester->department->schemeid),
     $model->semester->department->dept_name=>array('/department/view','id'=>$model->semester->dptid),
	 $model->semester->sem_name=>array('/semester/view','id'=>$model->semid),
	$model->sub_name,
);

$this->menu=array(
	array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
	array('label'=>'Update Subject', 'url'=>array('update', 'id'=>$model->subid)),
	array('label'=>'Delete Subject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->subid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subject', 'url'=>array('admin')),
	array('label'=>'Create Question Paper','url'=>array('/year/create','subid'=>$model->subid)),
	array('label'=>'Create Study Material','url'=>array('/material/create','subid'=>$model->subid)),
);
?>

<div class='viewhead'><h1><?php echo $model->sub_name; ?></h1></div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'subid',
		'semester',
		'sub_name',
	),
));*/ ?>
<br>
<h2>Year</h2>
<?php $this->widget('zii.widgets.CListView',array(
         'dataProvider'=>$yearDataProvider,
		 //'viewData' => array( 'switch' => true, 'blah' => $dir1 ),
		 'viewData' => array( 'dir1' => $dir1 ),
		 'itemView'=>'/year/_view',
		 ));?>

