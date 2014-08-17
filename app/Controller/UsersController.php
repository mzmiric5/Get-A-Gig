<?php
# alot of commented code in this version, will be needed for some extra features later
# like search, login e.t.c leave it like that for now -- Orestis
class UsersController extends AppController 
{ 
    var $name = "Users"; 
    var $helpers = array('Html', 'Form'); 
    #Authorisation component    
    #var $components = array('Auth'); 

    # handles user login
    function login()
    {
      # get the post data from the request
      $_data = $this->request->data;
      # see if username and password are valid
      # if the data is not set
      if(isset($_data['username']) && isset($_data['password']))
      {    
        if(isset($_data['password']))
        {
          # create the hashed password to check with the one from database
          $hashPass = hash('sha1',$_data['password']);
        }
        $result = $this->User->find('all', array('conditions' => array(
                                                 'User.username' => $_data['username'],
                                                 'User.password' => $hashPass)));
        # if the password and username do no not match someone in the database
        if(empty($result))
        {
          # try to find by username
          $result = $this->User->findByusername($_data['username']);
          # if there is not even a username by that username
          if(empty($result))
          {
            # render the fulllogin
            $this->render("login");          
          }
          # if there is a user with that username
          else
          {  
            # get the name of either venue or artist
            $user_id = $result['User']['user_id'];
            $type = $result['User']['account_type'];
            if($type == 'venue')
            {
              # load the model and get the venue name linked to that username
              $this->loadModel('Venue');
              $venueDetails = $this->Venue->findByuser_id($user_id);
              $thename = $venueDetails['Venue']['name'];
              $profilePicture = $venueDetails['Venue']['profile_picture'];
            }
            else
            {
              # load the model and get the artist name linked to that username
              $this->loadModel('Artist');
              $artistDetails = $this->Artist->findByuser_id($user_id);
              $thename = $artistDetails['Artist']['name'];
              $profilePicture = $artistDetails['Artist']['profile_picture'];
            }    
            #get and set the user's profile picture
            $this->set('profilePicture', $profilePicture);
            #pass the username to the partial login fail page
            $this->set('_username', $_data['username']);
            # pass the actual venue or artist name
            $this->set('user', $thename);
            # render the login for partial fail
            $this->render("partiallogin");           
          }//else
        }//if
        else
        {
          # LOGIN
          # write the session variables
          $this->Session->write('User.id', $result[0]['User']['user_id']);
          $this->Session->write('User.type', $result[0]['User']['account_type'] );
          $this->redirect(array('controller' => $result[0]['User']['account_type'].'s'
                                                , 'action' => 'home'));
          # $this->set('User.profilePicture', $result[0]['User']['profile_picture']);
          # redirect to home                        
        }//else
      }//if
    }//login 

    function logout()
    {
      # delete the Session
      $this->Session->delete('User');
      # redirect
      $this->redirect('/');
    }

    function beforeFilter()
    {
      if($this->action == 'login')
        #check if session exists
        if($this->checkSession() == true)
          $this->redirect('/');
        else
          return true;
      else
        return true;
    }
} //class
