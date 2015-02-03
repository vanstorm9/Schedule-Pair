<html>

<?php 
require 'connect.php';

$id= $_GET['p'];
$code= $_GET['o'];
$random = rand(23456789,98765432);

if($id&&$code){
	$check = mysql_query("SELECT * FROM users WHERE id='$id' AND random='$code'");
	$checknum = mysql_num_rows($check);
		  
	$activate_query = mysql_query("SELECT activated FROM users WHERE id='$id'");
	$activate_row = mysql_fetch_assoc($activate_query);
	$activate = $activate_row['activated']; 

	if ($checknum == 1){
	  
		if($activate != 1){
			
			mysql_query("UPDATE users SET activated='1',random='$random' WHERE id='$id' AND random='$code'") or die("There was a problem activating your account. Please contact me at antlowhur@yahoo.com");
			
			?>
			Your account has been activated. <a href='index.html'>You may now login here</a>.
			<br><br>
			Would you like to upload your avatar?
			
			<form action='pre_upload.php' method='post' enctype='multipart/form-data'>
			<input type='file' name='myfile'><p><br>
			<button type='submit' name='Upload'>Upload Profile Picture</button>
			<input type='hidden' value='<?php echo $id;?>' name='id_box'>
			</form>
			
			<?php
	
		} else {
			echo "You have already activated your account!";
			
		}


    } else {
        echo "Invalid ID or Activation code. Please contact the site administrator at antlowhur@yahoo.com (Anthony Lowhur)";
    }


} else {
    die("Data missing!");
	}
?>

</html>