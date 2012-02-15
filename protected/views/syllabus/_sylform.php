

<?php 
	   if(Yii::app()->user->isGuest)
	   {
		
		foreach($syllabus as $s)
		 {
		 
		 $dir=$dir1.'\\'.$s->sylid.'.pdf';
		 echo CHtml::link(CHtml::encode("View"),Yii::app()->assetManager->publish($dir),array("target"=>'_blank'));
		 }
		 
         }
		 else
          	
              	  
		     $this->renderPartial('/upload/index',array(
              'model'=>$modell,
			 'uploaded' => $uploaded,
             'dir' => $dir1,
	         ))

		   
		?>
		


