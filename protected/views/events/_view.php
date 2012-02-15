<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('eid')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->eid)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('link')); ?></b>
<!--	<a onClick='getLink()' > <?php //echo $data->link;?></a> -->
<?php echo "<a href='http://".$data->link."' class='btn'  target=_blank'>";?><?php echo $data->link; ?></a>
	<br />
	
	

</div>

