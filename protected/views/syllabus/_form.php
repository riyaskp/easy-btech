<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'syllabus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'semid'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'syl_name'); ?>
		<?php echo $form->textField($model,'syl_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'syl_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->