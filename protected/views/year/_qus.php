<?php 
	    
		$dir=$dir1.'\\'.$id.'.pdf';
		   
		   
		   
		if(Yii::app()->user->isGuest)
		 {
		 echo CHtml::link(CHtml::encode("View"),Yii::app()->assetManager->publish($dir),array("target"=>'_blank'));
		 }
		 
		if(!Yii::app()->user->isGuest)
		 
	          $this->renderPartial('/upload/index',array(
              'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir1,
	         ))

		  

		
		?>