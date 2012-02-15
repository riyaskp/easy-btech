<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('sem_name')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->sem_name), array('/semester/view', 'id'=>$data->semid)); ?>
	<br />



</div>