<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">
    <title>Roommate Search</title>

    <!-- Bootstrap -->
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.mi.css" rel="stylesheet">
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
	<?php 
	require 'connect.php';
	include 'general.php';
	include 'navbar.html';
	include 'sessioncheck.php';
	?>
	
</head>

<body>
<center>

<div class="container">
<br>
<h1>Settings</h1>
<br>
	<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Settings</div>
			<div class="panel-body">
<form action='settingsfu.php' method='POST'>
<center>
<table width='100%;'>
	<tr>
		<td style='padding:15px;'>
			Email Address:<input type="text" class="form-control" placeholder="Email Address" required autofocus name='email_change_box' value='<?php echo $user;?>'>	
		</td>
		<td style='padding:15px;'>
			First Name: <input type="text" class="form-control" style='300px;' placeholder="First Name" required autofocus name='first_name_change_box' value='<?php echo $my_first_name;?>'>
		</td>
		<td style='padding:15px;'>
			Last Name: <input type="text" class="form-control" style='300px;' placeholder="Last Name" required autofocus name='last_name_change_box' value='<?php echo $my_last_name;?>'>
		</td>
	</tr>
	<tr>
		<td style='padding:15px;'>
			Major: <input type="text" class="form-control" placeholder="Major" required autofocus name='major_box' value='<?php echo $my_major;?>'>	
		</td>
		<td style='padding:15px;'>
			Class Year: <input type="text" class="form-control" style='300px;' placeholder="Class of. . ." required autofocus name='class_of_box' value='<?php echo $my_class_year;?>'>
		</td>
	</tr>
</table>
<br>
<button class="btn btn-lg btn-primary btn-block" style='width:90%' type="submit" name='submit'>Save Changes</button>
</center>
</form>
<br><br>

<center>
<div style='width:80%'>
	<form action='upload.php' method='post' enctype='multipart/form-data'>
	<input type='file' name='myfile'><p><br>
	<button class="btn btn-lg btn-primary btn-block" style='width:90%' type="submit" name='Upload'>Upload Profile Picture</button>
	</form>
</div>
</center>

<br><br>
	
	<!--<form action='password_change.php' method='POST'>
	<center>
	<table style='width:60%;'>
		<tr>
			<td style='padding:15px;'>Old Password: <input type="password" class="form-control" style='300px;' placeholder="Old Password" required autofocus name='old_password_change_box'></td>
			<td style='padding:15px;'>Change Password: <input type="password" class="form-control" style='300px;' placeholder="Password" required autofocus name='password_change_box'></td>
			<td style='padding:15px;'>Retype Password: <input type="password" class="form-control" placeholder="Retype Password" required autofocus name='re_password_change_box'></td>
		</tr>
	</table>
	<br>
	<button class="btn btn-lg btn-primary btn-block" style='width:90%' type="submit" name='pass_submit'>Change Password</button>
	
	</center>
	</form>-->
	
</div>
</body>
</table>
</div>
</div>
</div>
</center>

</body>
</html>