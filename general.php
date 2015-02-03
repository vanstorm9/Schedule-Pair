<?php 
include 'connect.php';
include 'sessioncheck.php';

session_start();	
	
	$user = $_SESSION['username'];

$hash_query = mysql_query("SELECT random FROM users WHERE email='$user'");
$hash_row = mysql_fetch_assoc($hash_query);
$my_hash = $hash_row['random'];
			
					
$id_query = mysql_query("SELECT id FROM users WHERE email= '$user'");
$id_row = mysql_fetch_assoc($id_query);
$my_id = $id_row['id'];
			
$first_name_query = mysql_query("SELECT firstname FROM users WHERE email= '$user'");
$first_name_row = mysql_fetch_assoc($first_name_query);
$my_first_name = $first_name_row['firstname'];
					

$last_name_query = mysql_query("SELECT lastname FROM users WHERE email= '$user'");
$last_name_row = mysql_fetch_assoc($last_name_query);
$my_last_name = $last_name_row['lastname'];

$avatar_query = mysql_query("SELECT avatar FROM users WHERE email= '$user'");
$avatar_row = mysql_fetch_assoc($avatar_query);
$my_avatar = $avatar_row['avatar'];

$class_year_query = mysql_query("SELECT class_year FROM users WHERE id='$my_id'");
	$row_class_year = mysql_fetch_assoc($class_year_query);
	$my_class_year = $row_class_year['class_year'];	



//$social_site_query = mysql_query("SELECT social_site FROM search_info WHERE user_id = '$my_id'");
//$social_site_row = mysql_fetch_assoc($social_site_query);
//$my_social_site = $social_site_row['social_site'];


	$major_query = mysql_query("SELECT name FROM major WHERE id= (SELECT major FROM users WHERE id='$my_id')");
	$row_major = mysql_fetch_assoc($major_query);
	$my_major = $row_major['name'];

$fullname = $firstname." ".$lastname;



?>