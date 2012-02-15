	<?php
	
echo "<div class=".'label'."><label for=".'mt'.">Materials</label></div>";
		 
echo "<select id=".'mt'." onchange='getQus(this.value);'>";
echo "<option value=".''.">"."Select Material</option>";
		foreach($material as $s)
		 {
		 echo "<option value='".$s->mid."' >".$s->material_name."</option>";
		 }
		 echo "</select>";

?>

     <?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::link(CHtml::encode("create new material"),array('/material/create'));
		        }
			 ?>
<div id="qust">
	
	</div>



<input type="hidden" id="urlqus" value="<?php echo $this->createUrl('year/qus'); ?> ">