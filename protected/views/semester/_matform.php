
	<?php
echo "<div class=".'label'."><label for=".'sem'.">Semester</label></div>";
		 
echo "<select id=".'sem'." onchange='getSubject(this.value);'>";
echo "<option value=".''.">"."Select Semester</option>";
		foreach($semester as $s)
		 {
		 echo "<option value='".$s->semid."' >".$s->sem_name."</option>";
		 }
		 echo "</select>";

?>
      <?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::link(CHtml::encode("create new Semester"),array('/semester/create'));
		        }
			 ?>
      
<div id="subject">
	
	</div>



<input type="hidden" id="urlsub" value="<?php echo $this->createUrl('subject/mat'); ?> ">
