<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mid), array('view', 'id'=>$data->mid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subid')); ?>:</b>
	<?php echo CHtml::encode($data->subid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('material_name')); ?>:</b>
	<?php echo CHtml::encode($data->material_name); ?>
	<br />


</div>