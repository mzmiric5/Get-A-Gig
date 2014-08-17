<?php
/*
   # RegistrationController is now complete
** Notice : don't change the names on the signup forms, or if you mess with it don't change the names in the Data arrays
*/
class RegistrationController extends AppController
{
	var $name = "register"; 
    var $helpers = array('Html', 'Form');
    public $components = array('Geocoder', 'GeoPlaces');
	
	# creates a new account
    function addAccount()
    {
    	$autoRender=false;
    	# grab the main request POST data
    	$_data = $this->request->data;       
        # just for the shake of getting an error
    	$venueDetailsData = null;
        $artistDetailsData = null;
        #handler callback that overrides the error_handler
        #throws error for undefined index warning if data is partially set
        function errorHandlerCatchUndefinedIndex($errno, $errstr, $errfile, $errline ) 
        {
            // We are only interested in one kind of error
            // need to fix that
            if (true) 
            {
                //We throw an exception that will be catched in the test
                throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
            }
            return false;
        }//errorHandlercatchundefinedIndex
        //set the error handler
        set_error_handler("errorHandlerCatchUndefinedIndex");
        // try to get the data into the arrays
        $formType = $_data['formtype'];
        if($formType == 'venue')
            $postcodeForGeocodes = $_data['venuelocation'];
        else
            $postcodeForGeocodes = $_data['artistlocation'];
        try 
        {
            # here if undefined index occurs we will catch it
            if($formType=='venue')
            {
               $venueDetailsData = array( 'name' => $_data['venuename'],
                                       'type' => $_data['venuetype'],
                                       'location' => $_data['venuelocation'],
                                       'capacity' => $_data['venuecapacity'],
                                       'opening_times' => $_data['venuetimes'],
                                       'profile_picture' => 'https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg' ); 
        	   // make geocodes info array here
            }  
            else if($formType=='artist')
            {
                $artistDetailsData = array( 'name' => $_data['artistname'],
                                       'type' => $_data['artisttype'],
                                       'location' => $_data['artistlocation'],
                                       'genre' => $_data['artistgenre'],
                                       'no_of_members' => $_data['artistnoofmembers'],
                                       'bio' => $_data['artistbio'], 
                                       'profile_picture' => 'https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg'); 
            // make geocodes info array here
            }
        	# depicting the database rows
        	$contactDetailsData = array( 'name' => $_data['contactname'],
        								 'surname' => $_data['contactsurname'],
        								 'postcode' => $_data['contactpostcode'],
        							     'address_1' => $_data['contactaddress'],
                                         'city' => $_data['contactcity'],
                                         'phone_1' => $_data['contactphone'], 
                                         'email_1' => $_data['contactemail']);
        	# depicting the database rows
        	$userInformationData = array( 'username' => $_data['username'],
        		                          # what if password is empty ?, it's not gonna validate
                                          'password' => $_data['password'],
        		                          'email'    => $_data['email'],
        		                          'account_type' => $formType
                                        );
        }
        catch(Exception $e) #catching the undefined index error
        {
            # TODO provide a better message
            $error['error'] = array ( 0 => 'Request data was not correctly set');
            $this->registrationFail($error);
            #return false, used to exit the method 
            return false;
        }     
        #restore the error handler here
        restore_error_handler();
        # In order to get to that point evey kind 
        # try to save the data for user
        # the save method returns false if it fails
        $this->loadModel('User');
        # for data validation refer to the model!
        # before save validation is called
        # check if passwords are the same  
        $samepasswords = ($_data['password'] == $_data['passwordconfirm']);
        # if the passwords are the same
        if($samepasswords)
        {   
            # enable callbacks for password hashing refer to user model
            if($_data = $this->User->save($userInformationData, array( 'callbacks' => true )))       
    	    {
    	        #retrieve user_id
    	        $user_id = $_data['User']['user_id'];		    
    		    #depending on the form type either make a new venue or an artist
                if($formType == 'venue')
    		    {
                    #load model
                    $this->loadModel('Venue');
                    # add user_id
                    $venueDetailsData['user_id'] = $user_id;                
    		        #try to save data to the venue table
    	            $success = ($_data = $this->Venue->save($venueDetailsData));
                }
    	        else if($formType == 'artist')
                {
                    #load the model
                    $this->loadModel('Artist');
                    #add the user_id to the data to be commited
                    $artistDetailsData['user_id'] = $user_id;                
                    #try to save data to the artist table
                    $success = ($_data = $this->Artist->save($artistDetailsData));
                }                
                # finally add the contact details
                if($success != false)
    	        {
                    # add user_id to the contacts table data
    	            $contactDetailsData['user_id'] = $user_id;
                    #load the model 
    			    $this->loadModel('Contact');
                    #try the last save 
    	        	if($_data = $this->Contact->save($contactDetailsData))	   
    	        	{
                        // add the location details into the geocodes table
                        // Krish's shit :P
                        $this->loadModel('Geocode');
                        // $postcode means the location we get from the venue or artist
                        // (1st dialogue)
                        $this->Geocoder->address = $postcodeForGeocodes;
                        $this->Geocoder->geocode();
                        $lat = $this->Geocoder->latitude;
                        $long = $this->Geocoder->longitude;
                        $region = $this->Geocoder->region;
                        
                        // This is how to add a new entry for the user
                        // other stuff like address can get from the geoplaces api
                        $this->Geocode->set(array(
                            'lat' => $lat,
                            'lng' => $long,
                            'postcode' => $postcodeForGeocodes,
                            'county' => $region,
                            // is it working ?
                            'user_id' => $user_id
                        ));
                
                        if($this->Geocode->save())
                        {   
                            # SUCCESS
                            $this->Session->setFlash('Registered succesfully');
                            $this->redirect('/');
                        }
                        else
                        {   
                            # SUCCESS
                            $this->Session->setFlash('Failed');
                            $this->redirect('/');
                        }

                    }
    	        	else
    	        	{	
                        # FAIL -- contact
                        #return what went wrong in Contact
                        $error = $this->Contact->validationErrors;
                        # delete the User cascades and deletes the rest of the things that made
                        $this->User->Delete();
                        # redirect to fail page
                        $this->registrationFail($error);
                        return false;
    	        	}//else    	        	    	
    	        }//if
    	        else
    	        {
                    #FAIL -- venue or artist
                    # get what went wrong
                    if($formType == 'venue')
                        $error = $this->Venue->validationErrors;
                    else
                        $error = $this->Artist->validationErrors;
                    #delete the user
                    $this->User->Delete();
                    #redirect to fail page
                    $this->registrationFail($error);
                    return false;       	        	
    	        }//else
    	    }
    	    else
            {
                #FAIL -- user
                #get what went wrong
                $error = $this->User->validationErrors;
                $this->registrationFail($error);
                return false;                           
            }
        }//if samepasswords
        else
        {
           #passwords fail
           #say what went wrong 
           $error['password'] = array ( 0 => 'Passwords do not match');
           #redirect to error page
           $this->registrationFail($error);
           return;
        }// else samepasswords
    }//addAccount

    # callback method
    # security and access issues dealt here
    function beforeFilter()
    {       
        # proceed only if POST data is set
        if(empty($this->request->data))
            $this->redirect('/');
        if($this->checkSession())
            $this->redirect('/');
        else
            return true;
    }

    #when addAccount fails
    function registrationFail($error)
    {
        #restore the handler
        restore_error_handler();
        #set the error to be displayed 
        $this->set('error', $error);
        #render the view
        $this->render('/Users/registrationfail');
    }

    
}
?>