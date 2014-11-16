<?php
include_once 'db_connect.php';
include_once 'functions.php';

 
sec_session_start(); // Our custom secure way of starting a PHP session.
$_POST['email'] = 'johannacuriel@yahoo.com';
$_POST['p'] = 'f4c22d1f518470eba66c5fe46fe472b416128937e4e797b4fae60d7df3b90bf305aa07e83f08de8a9d179f5ed5a6f6b33b7e72777c710800a8e1297c659786b1';
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../profile.php');
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
        //echo $_POST['p'];
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid request' ;
}
?>