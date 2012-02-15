
	<?php

	echo "<div class=".'label'."><label for=".'sch'.">Scheme</label></div>";
		 
echo "<select id=".'sch'." onchange='getDepartments(this.value);'>";
echo "<option value=".''.">"."Select Scheme</option>";
		foreach($schemes as $s)
		 {
		 echo "<option value='".$s->schemeid."' >".$s->scheme_name."</option>";
		 }
		 echo "</select>";

?>

	<div id="department">
	</div>


<input type="hidden" id="urldepart" value="<?php echo $this->createUrl('department/test1'); ?> ">