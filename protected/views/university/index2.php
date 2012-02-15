<?php

$this->breadcrumbs=array(
	'Universities',
);

$this->menu=array(
	array('label'=>'Create University', 'url'=>array('create')),
	array('label'=>'Manage University', 'url'=>array('admin')),
);
?>
<?php echo $syll;?>
<h1>Universities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	//'cssFile'=>Yii::app()->theme->baseUrl.'/css/university_style.css',
	
)); ?>
