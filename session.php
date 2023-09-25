<?php

if(validSessionEmpCheck()==false) {
	if (file_exists("index.php")) header("location: index.php"); else header("location:index.php");  exit; 
}
if(!isset($_SESSION[$_SESSION['azureemp']])) {
	if (file_exists("index.php")) header("location: index.php"); else header("location:index.php");  exit;  
}
$Admin_Session_id = $_SESSION[$_SESSION['azureadmin']];
$Emp_Session_id = $_SESSION[$_SESSION['azureemp']];
?>
