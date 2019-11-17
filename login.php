<?php
session_start();
include_once('db_connect.php');
include_once('loginutils.php');
$login = $_POST['loginID'];
$_SESSION['uid'] = $login;
$pass  = $_POST['loginPassword'];
$result = checkUser($db, $login, $pass);
$output = "";
if($result == -1){
	$output =  "Sorry, cannot find your information. Please try again";
}
elseif ($result == -2) {
	$output =  "Sorry, the login you entered is not verified. Please verify your email";
}
elseif ($result == -3) {
	$output  =  "Sorry the password you entered is not correct";
}      
else{
	$output = "Login Succesful";
}

$str = "SELECT type FROM user WHERE userid = '$login';";
$result = $db->query($str);
$row = $result->fetch();
$type = $row[0];

if($type == "Student")
{
    echo '<script type="text/JavaScript"> 
     window.location.replace("https://projectcapstone.sites.gettysburg.edu/profFriend/Student.html"); 
     </script>' 
; 
}
else
{
    echo '<script type="text/JavaScript"> 
     window.location.replace("https://projectcapstone.sites.gettysburg.edu/profFriend/Faculty.php"); 
     </script>' 
; 
}

?> 

