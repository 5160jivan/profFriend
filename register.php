<?php
include_once('db_connect.php');
include_once('loginutils.php');
$result = registerUser($db, $_POST);
$output = "";
if($result == false){
	$output = "Cannot create account for _POST['registerID']";
}
else{
	$output = "Account created succesfully. Check your email to verify";
}
?>
<HTML>
<HEAD><TITLE>Thank you</TITLE></HEAD>
<BODY>
<H2>Hello</H2>
<TEXTAREA rows=‘4’ cols=‘60’>
<?php echo $output; ?>
</TEXTAREA>
</BODY>
</HTML>

