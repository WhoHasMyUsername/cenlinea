<?php
define("APPID","851217828251291");
define("SECRET","ce487e30c09e267571ca71ef71241ea9");

require 'facebook/facebook.php';

$facebook = new Facebook(array(
  'appId'  => APPID,
  'secret' => SECRET,
));


?>
