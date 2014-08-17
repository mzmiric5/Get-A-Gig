<?php $accType = $this->Session->read('User.type'); echo 'You are : '.$this->Session->read('User.type'); ?>
		  Your search for "<?php echo $searchString; ?>" returned <?php $count = count($result); echo $count; ?><!--this will be pulled form a var--> results:
		
	
<?php
// confusing I know but there is no easier way to cope with it
// need to provide better variable names
foreach($result as $key => $value)
{
      	foreach($result[$key] as $field => $fieldValue)
      	{
      		#set the profile links
      		if($field == 'Artist')
      		{
      			#the profile views are in the form <TYPE>/view/<USER_ID>
      			$linkToProfile = $this->webroot.'Artists/view/'.$fieldValue['user_id'];
      		}
      		elseif ($field == 'Venue') 
      		{
      			$linkToProfile = $this->webroot.'Venues/view/'.$fieldValue['user_id'];
      		}	
      		
      		echo '<div class="row">';
      		echo '<a class="span10 offset1 largeButton" href="'.$linkToProfile.'"><h3 style="padding:15px;">'.$fieldValue['name']
      		     .'</h3><p>'.$fieldValue['location'].'</br>'.$fieldValue['type'].'</br>'.'</p></a>';
		  	echo '</div>';
		  	
	    }
	    
	    
}	  

$this->element('ad');	#"I found ".$field."</br>".$fieldValue['name']."</br>".$fieldValue['location']."</br>".$fieldValue['type']."</br>"."</br>";
?>
</div>
</div>
<br/>