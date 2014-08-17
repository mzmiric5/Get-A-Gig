<?php $video = $_GET["video"]; ?>
<?php if ($video == 'venue') { echo $this->element('tutorialvenue');} ?>
<?php if ($video == 'artist') {echo $this->element('tutorialartist');} ?>
<?php if ($video == 'menu') {echo $this->element('tutorialmenu');} ?>