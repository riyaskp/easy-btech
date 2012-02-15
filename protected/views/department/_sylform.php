
	<?php
echo "<div class=".'label'."><label for=".'dpt'.">Department</label></div>";
		 
echo "<select id=".'dpt'." onchange='getSemester(this.value);'>";
echo "<option value=".''.">"."Select Department</option>";
		foreach($departs as $s)
		 {
		 echo "<option value='".$s->dptid."' >".$s->dept_name."</option>";
		 }
		 echo "</select>";

?>  

<div id="create1">
       <?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::link(CHtml::encode("create Department"),array('/department/create'));
		        }
			 ?>
</div>
	<div id="semester">
	</div>
<input type="hidden" id="urlsemester" value="<?php echo $this->createUrl('semester/test'); ?> ">
