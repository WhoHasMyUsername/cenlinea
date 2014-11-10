<?php

include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();

//This function will create a new user account or save file
function setScore($user_id, $mysqli)
{
	if(isset($_GET["score"]) && isset($_GET["lessonID"]) && isset($_GET["s"]))
	{
		//if(md5($_GET["score"].$secret) == $_GET["s"])
		//{
			$query = "INSERT INTO scores(user_id, lessonID, score) VALUES('" . $_SESSION["$user_id"] . "', '" . $_GET["lessonID"] . "', '" . $_GET["score"] . "')";
			//$result = mysqli_query($connection1, $query);
		//}
		//else
		//{
		//	die("Security hash mismatch");
		//}
	}
	else
	{
		die("Not all required variables were found");
	}
}

?>