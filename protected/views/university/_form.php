<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'university-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textField($model,'uname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'uname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->