<?php
ob_start();
include ("connection.php");
include("facebook_constants.php");

 $_SESSION['username'] = $fusername;

$users = $facebook->getUser();

if ($users!="") {	
  try {

    $user_profile = $facebook->api('/me');
	$logoutUrl = $facebook->getLogoutUrl();
	$fuserid=$user_profile["id"];
	$fusername=$user_profile["username"];
	$password="";
	$newtoken=base64_encode($fuserid."::".$fusername);

	$msql = mysql_query("SELECT * FROM members WHERE passcode='".$fuserid."'" );

	if(mysql_num_rows($msql)>0){
		$sqlrow=mysql_fetch_object($msql);
		header('Location:../includes/process_login_fb.php');
	}
	else{		
		header('Location:register_fb.php?token='.$newtoken);
		exit;
	}

  } catch (FacebookApiException $e) {
    $users = null;
  }
}
?>