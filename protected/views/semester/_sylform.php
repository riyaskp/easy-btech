<?php
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript("jquery");

?>
	<?php
echo "<div class=".'label'."><label for=".'sem'.">Semester</label></div>";
		 
echo "<select id=".'sem'." onchange='getSyllabus(this.value);'>";
echo "<option value=".''.">"."Select Semester</option>";
		foreach($semester as $s)
		 {
		 echo "<option value='".$s->semid."' >".$s->sem_name."</option>";
		 }
		 echo "</select>";

?>
 <?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::ajaxLink('create new semester',array('semester/dialoge'),array(
                  'success'=>'js:function(data){
                 $("#createSemester").dialog("open");
                  document.getElementById("create_dialoge").innerHTML=data;
				  }'));
                       
                   


                 $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                  'id'=>'createSemester',
                  'options'=>array(
                    'title'=>'Create Semester',
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
 

               echo "<div id='create_dialoge'></div>";


			      $this->endWidget('zii.widgets.jui.CJuiDialog');
                   }
		        
			 ?>
<div id="syllabus">
	
	</div>



<input type="hidden" id="urlsyll" value="<?php echo $this->createUrl('syllabus/test'); ?> ">
