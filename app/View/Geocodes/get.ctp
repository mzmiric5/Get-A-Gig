<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>";
echo $this->Html->script($this->GoogleMapV3->apiUrl());

# init map (prints container)
echo $this->GoogleMapV3->map(array('div'=>array('height'=>'400', 'width'=>'100%')));

	

  	foreach ($results as $result) {
    debug($result);
			# tip: use it inside a for loop for multiple markers
			$this->GoogleMapV3->addMarker(array('lat'=>$result['geocodes']['lat'],'lng'=>$result['geocodes']['lng'], 'title'=>'Marker',           'content'=>'Some Html-<b>Content</b>', 'icon'=>$this->GoogleMapV3->iconSet('green', 'E')));
	}


# print js
echo $this->GoogleMapV3->script();

?>
