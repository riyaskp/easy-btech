<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nid), array('view', 'id'=>$data->nid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />


</div>