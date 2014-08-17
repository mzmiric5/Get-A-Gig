<?php global $needsAWizard; $needsAWizard = true; ?>
<?php $type = $_GET["type"]; ?>
<?php if ($type == 'venue') { echo $this->element('venuesup');} ?>
<?php if ($type == 'artist') {echo $this->element('artistsup');} ?>
                      
