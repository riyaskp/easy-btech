<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('dept_name')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->dept_name), array('/department/view', 'id'=>$data->dptid)); ?>
	<br />

</div>