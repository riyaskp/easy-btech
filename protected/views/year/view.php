<?php
$this->breadcrumbs=array(
	'Years'=>array('index'),
	$model->yid,
);

$this->menu=array(
	array('label'=>'List Year', 'url'=>array('index')),
	array('label'=>'Create Year', 'url'=>array('create')),
	array('label'=>'Update Year', 'url'=>array('update', 'id'=>$model->yid)),
	array('label'=>'Delete Year', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->yid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Year', 'url'=>array('admin')),
);
?>

<div class='viewhead'><h1><?php echo $model->year; ?></h1></div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'yid',
		'subid',
		'year',
		'qpaper',
	),
));*/ ?>

</br>
<?php
if(!Yii::app()->user->isGuest)
       
$this->renderPartial('/upload/index',array(
        'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir,
	   ))

	  ?>