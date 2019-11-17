<?php
include_once('db_connect.php');
include_once('loginutils.php');
$input = $_GET['uid'];
verifyEmail($db,$input);
?>
