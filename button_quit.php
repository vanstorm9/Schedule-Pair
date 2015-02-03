<?php 
require 'connect.php';
require 'general.php';
require 'sessioncheck.php';

$quit_submit = $_POST['quit_class_but'];
$class_id = $_POST['classidhide'];

if ($quit_submit){
	mysql_query("DELETE FROM relationship WHERE class='$class_id' && user='$my_id'");
	
	echo 'You have successfully removed a class. <br><a href="class-manager.php">Please click here to continue</a>';
}
?>