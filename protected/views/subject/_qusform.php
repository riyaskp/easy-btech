
	<?php
echo "<div class=".'label'."><label for=".'sub'.">Subject</label></div>";
		 
echo "<select id=".'sub'." onchange='getYear(this.value);'>";
echo "<option value=".''.">"."Select Subject</option>";
		foreach($subject as $s)
		 {
		 echo "<option value='".$s->subid."' >".$s->sub_name."</option>";
		 }
		 echo "</select>";

?>
<div id="year">
	
	</div>



<input type="hidden" id="urlyear" value="<?php echo $this->createUrl('year/test1'); ?> ">
