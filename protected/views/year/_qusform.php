
	<?php
echo "<div class=".'label'."><label for=".'yr'.">Exam</label></div>";
		 
echo "<select id=".'yr'." onchange='getQus(this.value);'>";
echo "<option value=".''.">"."Select Exam</option>";
		foreach($year as $s)
		 {
		 echo "<option value='".$s->yid."' >".$s->year."</option>";
		 }
		 echo "</select>";

?>
<?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::link(CHtml::encode("create new University"),array('/year/create'));
		        }
			 ?>

<div id="qust">
	
	</div>



<input type="hidden" id="urlqus" value="<?php echo $this->createUrl('year/qus'); ?> ">