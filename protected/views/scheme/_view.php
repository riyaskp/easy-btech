<div class="view">
     
	<b><?php //echo CHtml::encode($data->getAttributeLabel('scheme_name')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->scheme_name), array('/scheme/view', 'id'=>$data->schemeid,)); ?>
	<br />


</div>