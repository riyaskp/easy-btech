<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sylid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sylid), array('view', 'id'=>$data->sylid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semid')); ?>:</b>
	<?php echo CHtml::encode($data->semid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('syl_name')); ?>:</b>
	<?php echo CHtml::encode($data->syl_name); ?>
	<br />


</div>