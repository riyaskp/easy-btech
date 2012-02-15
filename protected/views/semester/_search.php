<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'semid'); ?>
		<?php echo $form->textField($model,'semid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dptid'); ?>
		<?php echo $form->textField($model,'dptid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sem_name'); ?>
		<?php echo $form->textField($model,'sem_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->