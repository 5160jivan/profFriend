<?php
include_once('db_connect.php');
//checkuser checks the credentials of the user
function checkUser($db, $login, $pass ){
	$hash = md5($pass);
	$query = "SELECT* FROM user WHERE userid = '$login';";
	$queryP = "SELECT* FROM user WHERE userid= '$login' AND password = '$hash';";
	$queryU = "SELECT* FROM unverified WHERE userlogin = '$login';";
	$resultU = $db->query($queryU);
	$result = $db->query($query);
	$resultP = $db->query($queryP);
	if($result-> rowCount() == 0 ){
		return -1;
	}
	elseif($result-> rowCount > 0  and $resultU-> rowCount >0) {
		return -2; 
	}
	
	else if($result->rowCount > 0 and $resultP-> rowCount < 0){
	return -3;
	}
	
	else{
		return 1;
	}
}

//addUser adds the user with given credentials
function addUser($db, $login, $pass, $type, $email){
	$passH = md5($pass);
	$queryUser = "INSERT INTO user VALUES('$login', '$email', '$type', '$passH');";
	$queryUserResult = $db->query($queryUser);
	$queryUn = "INSERT INTO unverified VALUES('$login') ;";
	$queryUnResult = $db->query($queryUn);
	if($queryUserResult == true){
		echo"<P>Successfully entered the values into user table</P>\n";
	}
	else{
		echo"<P>Failed to add $login to table user";
	}
	
	if($queryUnResult == true){
		echo"<P>Successfully entered the values into unverified table</P>\n";
	}
	else{
		echo"<P>Failed to add $login to  unverified table";
	}
}

//registerUser adds a new user if the user is not already in the database
function registerUser($db, $input){
	$login = $input['registerID'];
	$pass = $input['registerPassword'];
	$type = $input['userType'];
	$url = "https://projectcapstone.sites.gettysburg.edu/profFriend/verify.php?uid=".$login; 
	$content = '<a href = "'.$url.'">Click here to verify</a> ';
	$subject = "Verification for".$login;
	$header = 'FROM:' ."kharji01@gettysburg.edu";
	$email = $input['registerEmail'];
	$toEmail = 'kharji01@gettysburg.edu';
	$queryEmail = "SELECT* FROM user WHERE email = '$email';";
	$queryEmailResult = $db->query($queryEmail);
	$query = "SELECT* FROM user WHERE userid = '$login';";
	$queryResult = $db->query($query);
	if($queryResult->rowCount > 0 || $queryEmailResult->rowCount >0){
		return false;	
	}
	else{
		addUser($db, $login,$pass, $type, $email);	
		mail($email,$subject, $content, $header);
		return true;
	}

}

//verifyEmail verifies the user by removing from unverified table
function verifyEmail($db, $userlogin){
	$queryRemove = "DELETE FROM unverified WHERE userlogin = '$userlogin';";
	$result = $db->query($queryRemove);
	if($result != FALSE){
		echo"verified  succesfully";
	}
	else{
		echo"Error verifying $userlogin";
	}

}
?>
