<?php $type = $_GET["type"]; 
      if ($type == 'venue') { echo $this->element('venuePrivacySettings');}
      else if ($type == 'artist') {echo $this->element('artistPrivacySettings');}
      else echo '<h1>Oh oh, looks like your user type is not specified.</h1><p>This page cannot be rendered without a specified usertype.</p>';
