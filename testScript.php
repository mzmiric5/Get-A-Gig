<?php 

//connect to database
$connection = mysql_connect('176.34.191.70','gag','gagpass');
mysql_select_db("gag_db", $con);

$i = 0;
while ($i < 10)
{
  $password = hash('sha1', 'Testuserpass'.$i);
  $user = "INSERT INTO users (username, password, email)
           VALUES ('testuser".$i."','".$password."','arandomemail".$i."@gmail.com');";
  mysql_query($user);  
  $i = $i + 1;
}
echo I created $i users;
?>
  
