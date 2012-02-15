<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'dptid'); ?>
		<?php echo $form->textField($model,'dptid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sylid'); ?>
		<?php echo $form->textField($model,'sylid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dept_name'); ?>
		<?php echo $form->textField($model,'dept_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->