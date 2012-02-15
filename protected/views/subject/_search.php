<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'subid'); ?>
		<?php echo $form->textField($model,'subid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semid'); ?>
		<?php echo $form->textField($model,'semid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_name'); ?>
		<?php echo $form->textField($model,'sub_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->