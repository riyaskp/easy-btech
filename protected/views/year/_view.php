<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('yid')); ?></b>
 
	<?php 
	
		$dir=$dir1.'\\'.$data->yid.'.pdf';
		//echo $dir;
	//echo CHtml::link(CHtml::encode($data->year),$dir,array('target'=>'_blank')); 
	?>
	<br />

	 <?php //echo CHtml::link("Download sample",Yii::app()->assetManager->publish(Yii::getPathOfAlias('applicaion').'/assets/excel/sample.xls'),array("target"=>'_blank'));?>
	 <?php echo CHtml::link(CHtml::encode($data->year),Yii::app()->assetManager->publish($dir),array("target"=>'_blank'));?>



</div>