<div class="view">

	
	<?php //echo CHtml::encode($data->getAttributeLabel('university')); ?>
	<div class='university1'><?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/univers/'.$data->uid.'.jpg.jpg'),array('view', 'id'=>$data->uid));?></div>
    <div class='university'><?php echo CHtml::link(CHtml::encode($data->uname),array('view', 'id'=>$data->uid));	?></div>
	
	

 </div>