<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="keywords" content="Global Website Template, XHTML CSS" />
<meta name="description" content="Global Website Template, XHTML CSS layout" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/templatemo_style.css" />
	</head>

<body>
<div id="templatemo_container">

	<div id="content_left">
        <div id="site_title">
        	<div id="site_name">
            	Easy Btech</div>
            <div id="site_slogan">
            	Get it the easy way...</div>
        </div>	
        
        <div id="templatemo_menu">
            <ul>
               
                
					 <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			     array('label'=>'Question papers', 'url'=>array('/university/qusform')),
				array('label'=>'Syllabus', 'url'=>array('/university/sylform')),
				array('label'=>'Materials', 'url'=>array('/university/matform')),
				array('label'=>'Projects', 'url'=>array('/project/index')),
				array('label'=>'Seminar', 'url'=>array('/seminar/index')),
				
				
				array('label'=>'Events', 'url'=>array('/events/index')),
				
				
			),
		)); ?>
          </ul>
	    </div> 
        
        <div class="margin_bottom_40"></div>
        
        <div class="service_box">
        	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/templatemo_download_box.jpg" alt="download" /></a>
        </div>
        
        <div class="margin_bottom_20"></div>
        
        <div class="service_box">
        	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/templatemo_live_chat_box.jpg" alt="live chat" /></a>
        </div>
        
        <div class="margin_bottom_20"></div>
        
        <div class="service_box">
        	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/templatemo_call_box.jpg" alt="call us" /></a>
        </div>
        
        <div class="margin_bottom_20"></div>
        
        <div class="service_box">
        	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/templatemo_mail_box.jpg" alt="mail to us" /></a>
        </div>
        
        <div class="margin_bottom_40"></div>
        
        <!-- end of menu -->
    </div> <!-- end of content left -->
    
    <div id="content_right">
    	<div id="top_menu">
        	<ul>
                
                <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
			</ul>
        </div>
        
        <div id="template_banner">
        	<div class="header">Engineers Choice</div>
          
        </div>
        
        <div class="margin_bottom_40"></div>
        
        <div class="section_w270 margin_right_60">
        	
	
			
            <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
            
            <div class="margin_bottom_10"></div>
        <div class="margin_bottom_20"></div>
           
        </div>
        
        
        
        <div class="margin_bottom_50"></div>
        
        
    
</div> <!-- end of container -->




<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2012 <a href="www.nintriva.com">Nintriva Wireless</a> 
    </div> <!-- end of footer -->
</div>

</body>
</html>