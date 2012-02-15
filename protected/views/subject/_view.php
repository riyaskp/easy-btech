<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('subid')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->sub_name), array('/subject/view', 'id'=>$data->subid)); ?>
	<br />

	


</div>