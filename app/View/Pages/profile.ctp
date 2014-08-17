<?php $type = $_GET["type"]; 
      if ($type == 'venue') { echo $this->element('venueprofile');}
      else if ($type == 'artist') {echo $this->element('artistprofile');}
      else echo '<h1>Oh oh, looks like your user type is not specified.</h1><p>This page cannot be rendered without a specified usertype.</p>';
