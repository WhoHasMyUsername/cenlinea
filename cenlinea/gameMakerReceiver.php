<?php

//DB connection, should probably already be set before on the actual website
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

//user
//$_SESSION['user_id'] = $userid;
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

//Secret key: should be hidden somewhere safe on the server (private_html ?)
$sk = "C4nl1n34_1337";

//if(!isset($_SESSION["loggedIn"]))
	//die("Not logged in");

/* -- START OF THE GAMEMAKER RECEIVER SCRIPT: NO CONFIGURATION NEEDED BELOW (except for the $query)-- */

if(isset($_GET["f"]))
{
	switch($_GET["f"])
	{
		case "setScore": setScore($mysqli, $sk); break;
		default: die("Function given is not valid");
	}

}

function setScore($mysqli1, $s)
{
	if(isset($_GET["score"]) && isset($_GET["lessonID"]) && isset($_GET["s"]))
	{
		if(md5($_GET["score"].$s) == $_GET["s"])
		{
			//$query = "INSERT INTO scores(userID, lessonID, score) VALUES('" . $_SESSION["userID"] . "', '" . $_GET["lessonID"] . "', '" . $_GET["score"] . "')";
			$query = "INSERT INTO scores(userID, lessonID, score) VALUES('" .  $_SESSION['user_id'] . "', '" . $_GET["lessonID"] . "', '" . $_GET["score"] . "')";
			$result = mysqli_query($mysqli1, $query);
			return $result;
		}
		else
		{
			die("Security hash mismatch");
		}
	}
	else
	{
		die("Not all required variables were found");
	}
}

?>