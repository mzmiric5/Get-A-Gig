<h1> Registration failed </h1>
<p> Seems that you have disabled javascript, this is not suggested because your experience of the
	site will be poor. Please refer to your browser settings in order to enable it, or if you insist
	<a href="<?php echo $this->webroot ?>pages/signup?type=venue">go back</a> to register correctly.
<h2>	What went wrong:  </h2>
<?php
foreach ($error as $key => $value)
    print "Field: "."<b>".$key."</b>"." ----> ".$value[0]."</br>";
 ?> 
