<?php 
class UploadsController extends AppController
{    
  //upload a picture to amazon s3 photobucket
  function uploadProfilePic()
  {
    App::import('Vendor', 's3', array('file' => 's3.php'));
    App::import('Vendor', 'functions', array('file' => 'functions.php'));
    //AWS access info
	  define('ACCESS_KEY', 'AKIAJE6OZDHAREKRCWGQ');
	  define('SECRET_KEY', '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');
	  define('BUCKET_NAME', 'get-a-gig');
	
	  $id = $this->Session->read('User.id');
	  $type = $this->Session->read('User.type');
	  //instantiate the class with the acces key and secret key
	  $s3 = new S3(ACCESS_KEY, SECRET_KEY);
	
	  //check whether a form was submitted
	  if(isset($_POST['Submit']))
    {
		  //retreive post variables
		  $fileName = $_FILES['file']['name'];
		  $fileTempName = $_FILES['file']['tmp_name'];
		  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		  if(strlen($fileName))
		  {
			  list($txt, $ext) = explode(".", $fileName);
			  if(in_array($ext,$valid_formats))
			  {
				  $actual_image_name = $id.".".$ext;
				  // upload file to S3
          // Alright about that part, mike you have to figure out a way to delete the old profile picture before setting the new one
          // Also , cakephp doesn't really encourage the use of the query command so I should probably change it in the future
          // The controller is named Uploads Controller that means it can also be used to implement more controller actions in the
          // future
                  deletePhoto($s3, BUCKET_NAME, $actual_image_name);
				  if(uploadPhoto($s3, BUCKET_NAME, $fileTempName, 'useravatar/'.$actual_image_name))
				  {
					  //update the database
            //first load the appropriate model
            if ($type == 'venue')
            {
              $this->loadModel('Venue');
              // set the query
              $query = 'UPDATE venues 
                        SET profile_picture = "https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/'.$actual_image_name.'"
                        WHERE user_id='.$id.';';
              if($this->Venue->query($query))
              $this->Session->setFlash('Uploaded !');
            }
            else if ($type == 'artist')
            {
              $this->loadModel('Artist');
              // set the query
              $query = 'UPDATE artists 
                        SET profile_picture = "https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/'.$actual_image_name.'"
                        WHERE user_id='.$id.';';
              if($this->Artist->query($query))
              $this->Session->setFlash('Uploaded !');
            }
				  }
				  else
					  $this->Session->setFlash('Failed to upload..');
			  }
			  else
				  $this->Session->setFlash('Invalid file format..');
		  }
		  else
			  $this->Session->setFlash('Please Select image ...!');				
	  }//if isset
    // redirect to home
    $this->redirect('/');
  
  }//uploadPic

}//class
?>
