<?php

	//this should be implemented into the controller, and should run on registration, generate a random key and make a link out of it, when user clicks it the controller reconginzes it exists in db and activates the user then just deletes the key, the same should be used for pass reset, also the controller should route to a success page after this has been done
$key     = md5(rand(3890, 9999999)); //this needs to be saved in the db to match the activation link for registation confirm and 
$to      = 'miso.zmiric@gmail.com'; //use this to match the variable
$subject = 'Welcome to Get-A-Gig'; //ok this should also be Welcome or Password reset
$message = '<html><body><p>Hi there, thanks for registering with Get-A-Gig. Please click the followig link to activate your account. <a href="http://test.get-a-gig.co.uk/controller/action/'.$key.'">http://test.get-a-gig.co.uk/controller/action/'.$key.'</a></p>';
$headers = 'From: no-reply@get-a-gig.co.uk' . "\r\n" .
    'Reply-To: support@get-a-gig.co.uk' . "\r\n" .
    'Content-type: text/html' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>