<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	
		<?php echo $form->hiddenField($model,'semid'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_name'); ?>
		<?php echo $form->textField($model,'sub_name'); ?>
		<?php echo $form->error($model,'sub_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->