<?php
//variables must start with $
//String concatenation operator is .
$host = "localhost";
$dbase = "projectc_project_hackathon";
$user = "projectc_hackathon_user";
$pass = "Hack2019";

try{
	$db = new PDO("mysql:host=$host;dbname=$dbase",$user,$pass);
}
catch(PDOException $e){
	die("Error connecting to MYSQL server: " .$e->getMessage());
}
?>
