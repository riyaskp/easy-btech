<?php
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript("jquery");

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	
	'enableAjaxValidation'=>false,
	
)); 
?>
<div class="row">
  
		<?php
		echo $form->labelEx($model,'uname'); ?>
		<?php echo $form->dropDownList($model,'uname',$model->getUniversityList(),array('onchange'=>'getSchemes(this.value)','empty'=>'Select university')); ?>
		<?php echo $form->error($model,'uname'); ?>
	      
	

	      <?php 
		  //create university dialoge box
		  
		      if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::ajaxLink('create new university',array('university/dialoge'),array(
                  'success'=>'js:function(data){
                 $("#createUniversity").dialog("open");
                  document.getElementById("create_university").innerHTML=data;
				  }'));
                       
                   


                 $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                  'id'=>'createUniversity',
                  'options'=>array(
                    'title'=>'Create University',
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
 

               echo "<div id='create_university'></div>";


			      $this->endWidget('zii.widgets.jui.CJuiDialog');
                   }
		        
			 ?>
			 
			 
			   
	
	<div id="scheme">
	</div>
	</div>
	
	
<?php $this->endWidget(); ?></div>
<input type="hidden" id="url" value="<?php echo $this->createUrl('scheme/test'); ?> ">
<script type='text/javascript'>
function getSchemes(uid)
{

//document.write("uid").innerHTML=uid;
 //document.getElementById("create_university").innerHTML='';
 if(uid==""){
 document.getElementById("scheme").innerHTML='';
 return;
 }
  
 // alert(uid);
 jQuery(function($){
 
 var url=document.getElementById("url").value;
//alert(url); 
//url+="?uid="+uid;

$.post(url, { uid:uid },
   function(data){
    document.getElementById("scheme").innerHTML=data; 
	//document.getElementById("scheme_link").style.display="block";
	   
   });
  
});
}
</script>
<script type='text/javascript'>
function getDepartments(id)
{ 
 
 if(id==""){
 document.getElementById("department").innerHTML='';
  return;}
 // alert("ok");
  //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urldepart").value;
  //alert(url); 
//url+="?uid="+uid;

$.post(url, { schemeid:id },
   function(data){
  
    document.getElementById("department").innerHTML=data; 
	    
   });
  
});
}
</script>

<script type='text/javascript'>
function getSemester(id)
{ 
 
 if(id=="")
 {
 document.getElementById("semester").innerHTML=''; 
	    
  return;
 }
  //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urlsemester").value;
  //alert(url); 
//url+="?uid="+uid;

$.post(url, { dptid:id },
   function(data){
  
    document.getElementById("semester").innerHTML=data; 
	    
   });
  
});
}
</script>

<script type='text/javascript'>
function getSyllabus(id)
{ 
 
 if(id=="")
 {
 document.getElementById("syllabus").innerHTML=''; 
  return;
 }
 //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urlsyll").value;
  //alert(url); 
//url+="?uid="+uid;

$.post(url, { semid:id },
   function(data){
  
    document.getElementById("syllabus").innerHTML=data; 
	    
   });
  
});
}
</script>