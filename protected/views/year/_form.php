<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'year-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'subid'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'qpaper'/*array('size'=>60,'maxlength'=>100)*/); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->