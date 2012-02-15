<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />


</div>