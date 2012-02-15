<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'material-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'subid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'material_name'); ?>
		<?php echo $form->textField($model,'material_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'material_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->