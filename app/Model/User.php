<?php
class User extends AppModel
{
	public $name = 'User';
    public $primaryKey = 'user_id';
    # variable providing validation logic
    public $validate = array(
        'username' => array(
            'basicRule' => array(
                'rule'     => '/^\w+$/',
                'message'  => "Your username is invalid. It must be atleast 5 to 15
                               characters long and only contain letters,
                               numbers and underscores."
            ),//basicRule
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => "Your username is invalid. It must be atleast 5 to 15
                               characters long and only contain letters,
                               numbers and underscores."
            ),//between
            'uniqueRule' => array(
                'rule' => 'isUnique',
                'message' => "There is already a user with the same username please pick another one."
            )                       
        ),//username
        'password' => array(
            'rule'    => '/(?=.*\d)(?=.*[A-Z]).{6,}$/',
            'message' => "Your password is invalid, it must contain atleast 6'
                          characters, 1 number and 1 uppercase character"
        ),//password
        'email' => array(
            'basicRule' => array(
                'rule' => 'email',
                'message' => 'Not a valid email, please provide a vaild one'
            ),//basicRule
            'uniqueRule' => array(
                'rule' => 'isUnique',
                'message' => "There is already a registered user with that email" 
            )//uniqueRule
        ) //email
    );//validate

    # before every save change the password to a hashed password
    function beforeSave($options)
    {
        $this->data['User']['password'] = hash('sha1', $this->data['User']['password']);
        return true;
    }

    // seting has one relationships
    // a user either has one artist or a venue
    public $hasOne = array(
        'Artist' => array(
            'className'    => 'Artist',
            'foreignKey'   => 'user_id',
            'dependent'    => true
        ),
        'Venue' => array(
            'className'    => 'Venue',
            'foreignKey'   => 'user_id',
            'dependent'    => true
        )
    );
/*    public $hasMany = array(
        'RecievedMessage' => array(
            'className' => 'Message',
            'foreignKey' => 'to_id',
            'dependent' => true),
        'SentMessage' =>array(
            'className' => 'Message',
            'foreignKey' => 'from_id',
            'dependent' => true));
    */
        

}                                 
?>
