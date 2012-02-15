<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mid'); ?>
		<?php echo $form->textField($model,'mid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subid'); ?>
		<?php echo $form->textField($model,'subid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'material_name'); ?>
		<?php echo $form->textField($model,'material_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->