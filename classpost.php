<?php 
require 'connect.php';
require 'general.php';

$message = nl2br(strip_tags($_POST['comment_box'])); 
$submit = $_POST['submit'];
$class_id = $_POST['topic_div'];


if($submit){
	mysql_query("INSERT INTO post VALUES('','$message','$my_id','$class_id',now(),now())") or die("There was a problem sending your comment.");
	
	echo "You have successfully submitted your comment. <a href='class.php?i=".$class_id."'>Click here to continue.</a>";

}

?>