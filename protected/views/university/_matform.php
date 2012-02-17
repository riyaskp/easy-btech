<?php
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript("jquery");

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	
	'enableAjaxValidation'=>false,
)); ?>
<div class="row">
  
		<?php
		echo $form->labelEx($model,'uname'); ?>
		<?php echo $form->dropDownList($model,'uname',$model->getUniversityList(),array('onchange'=>'getSchemes(this.value)','empty'=>'Select university')); ?>
		<?php echo $form->error($model,'uname'); ?>
	
	     <?php if(!Yii::app()->user->isGuest) 
		       {
			     echo CHtml::link(CHtml::encode("create new University"),array('/university/create'));
		        }
			 ?>
	
	
	<div id="scheme">
	</div>
	</div>
	

<?php $this->endWidget(); ?>	</div>
<input type="hidden" id="url" value="<?php echo $this->createUrl('scheme/mat'); ?> ">
<script type='text/javascript'>
function getSchemes(uid)
{ 
 if(uid==""){
 document.getElementById("scheme").innerHTML='';
 return;
 }
  
  //alert(uid);
 jQuery(function($){
 
 var url=document.getElementById("url").value;
//alert(url); 
//url+="?uid="+uid;

$.post(url, { uid:uid },
   function(data){
    document.getElementById("scheme").innerHTML=data; 
	    
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
function getSubject(id)
{ 
 
 if(id=="")
 {
 document.getElementById("subject").innerHTML=''; 
  return;
 }
 //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urlsub").value;
  //alert(url); 
//url+="?uid="+uid;

$.post(url, { semid:id },
   function(data){
  
    document.getElementById("subject").innerHTML=data; 
	    
   });
  
});
}
</script>

<script type='text/javascript'>
function getYear(id)
{ 
 
 if(id=="")
 {
 document.getElementById("year").innerHTML=''; 
  return;
 }
 //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urlyear").value;
  //alert(url); 
//url+="?uid="+uid;

$.post(url, { subid:id },
   function(data){
  
    document.getElementById("year").innerHTML=data; 
	    
   });
  
});
}
</script>


<script type='text/javascript'>
function getMat(id)
{ 
 
 if(id=="")
 {
 document.getElementById("qust").innerHTML=''; 
  return;
 }
 //alert(id);
  
 jQuery(function($){
 
 var url=document.getElementById("urlmat").value;
 //alert(url); 
//url+="?uid="+uid;

$.post(url, { mid:id },
   function(data){
     
    document.getElementById("qust").innerHTML=data; 
	    
   });
  
});
}
</script>