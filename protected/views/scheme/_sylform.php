<?php
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript("jquery");

?>

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
<?php
           if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::ajaxLink('create new Scheme',array('scheme/dialoge','id'=>5),array(
				  'beforeSend'=>'js:function(){
				  
				     alert("ok");
					 }',
                  'success'=>'js:function(data1){
				   alert("ok");
                 $("#createScheme").dialog("open");
                  document.getElementById("create_scheme").innerHTML=data;
				  }'));?>
                  
				  <?php
				  $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                  'id'=>'createScheme',
                  'options'=>array(
                    'title'=>'Create Scheme',
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
 

               echo "<div id='create_scheme'></div>";


			      $this->endWidget('zii.widgets.jui.CJuiDialog');
                } 
		        
			 ?>

	<div id="department">
	</div>


<input type="hidden" id="urldepart" value="<?php echo $this->createUrl('department/test'); ?> ">

