
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
<div id="subject">
	
	</div>



<input type="hidden" id="urlsub" value="<?php echo $this->createUrl('subject/test1'); ?> ">
