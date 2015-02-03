<?php
require 'connect.php';
require 'general.php';

$recieving_id = $_GET['i'];

$check = mysql_num_rows(mysql_query("SELECT * FROM relationship WHERE class='$recieving_id' && user='$my_id'"));

if ($recieving_id){
	if ($check == 0){
		mysql_query("INSERT INTO relationship VALUES('','$my_id','$recieving_id')");

		echo 'Quit Class';
	} else {
		mysql_query("DELETE FROM relationship WHERE class='$recieving_id'");
		
		echo '<span class="glyphicon glyphicon-plus"></span> Join Class';
	}
}

?>