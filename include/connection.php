<?php

//error_reporting(0);
$type="remote";
if($type=="remote")
{
	$server="mysql-deltawork.mysql.database.azure.com";
	$db="azuredb";
	$username="harsh";
	$password="Test@123456789";
	  
}

$con=mysqli_connect($server, $username, $password, $db);
/*
if(mysqli_connect_error())
echo "Connection Error.";
else
echo "Database Connection Successfully.";exit;*/

//$pdo_conn = new PDO("mysql:host=$server;dbname=$db",$username,$password);

function validSessionCheck ()
{
$prints = 'AZR)99#AZR)99#';

if( 
	($_SESSION['azureadmin'] == strrev(md5(session_id().$prints.session_id())) )
	&&
	($_SESSION[$_SESSION['azureadmin']] == 1 )
) {
	return true;
}
else { session_destroy(); return false; }
	
}


function validSessionEmpCheck ()
{
$prints = ')99#SPN'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].')99#SPN';
$_SESSION['azureemp'] = strrev(md5(session_id().$prints.session_id()));
$_SESSION['azureadmin'] = strrev(md5(session_id()));

if( ($_SESSION[$_SERVER['HTTP_USER_AGENT']] == strrev(md5($_SERVER['HTTP_USER_AGENT'])) ) 
	&&	
	($_SESSION[$_SERVER['REMOTE_ADDR']] == strrev(md5($_SERVER['REMOTE_ADDR'])) ) 
	&&
	($_SESSION['azureemp'] == strrev(md5(session_id().$prints.session_id())) )
	&&
	($_SESSION[$_SESSION['azureadmin']] == 1 ) 
	&&
	($_SESSION[$_SESSION['azureemp']] != "" )
) {
	return true;
}
else { session_destroy(); return false; }
	
}
?>
