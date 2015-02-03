<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">
    <title>Create Classroom</title>

    <!-- Bootstrap -->
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.mi.css" rel="stylesheet">
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<?php  
require 'connect.php';
include 'navbar.html';
include 'sessioncheck.php';
?>

</head>

<body>
<div class="container" style='width:70%;'>
<center>
<h1>Create a Classroom</h1>
<br>
<form action='create-class-be.php' method='POST'>
	<table class='table'>
	<tr>
		<td>
			<input type="text" class="form-control" placeholder="Course Name" name='course_name'>
		</td>
		<td>
			<input type="text" class="form-control" placeholder="Professor Name" name='professor_name'>
		</td>
		<td>
			<select class="form-control" name='semester_name'>
				<option value="" disabled selected>Choose Semester</option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
			</select>
		</td>
	</tr>
	<tr>

		<td>
			<input type="text" class="form-control" placeholder="Year (ex: 2015)" name='year_name' maxlength='4'>
		</td>
	</tr>

	</table>
	<br><br>
	<table>
		<tr>
			<td style='width:120px;'>
				<input type="checkbox" name="monday_box" value="1"> Monday
			</td>
			<td style='width:250px;'>
				<input type="text" class="form-control" placeholder="Time (ex: 7:00)" name='monday_time_name' maxlength='5' style='width:120; float:left;'> &nbsp;&nbsp;
			
				<select class="form-control" name='monday_am_pm_name' style='width:90px;float:right;'>
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="tuesday_box" value="2"> Tuesday
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Time (ex: 7:00)" name='tuesday_time_name' maxlength='5' style='width:120; float:left;'>
			
				<select class="form-control" name='tuesday_am_pm_name' style='width:90px;float:right;'>
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="wednesday_box" value="3"> Wednesday
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Time (ex: 7:00)" name='wednesday_time_name' maxlength='5' style='width:120; float:left;'>
			
				<select class="form-control" name='wednesday_am_pm_name' style='width:90px;float:right;'>
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="thursday_box" value="4"> Thursday
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Time (ex: 7:00)" name='thursday_time_name' maxlength='5' style='width:120; float:left;'>
			
				<select class="form-control" name='thursday_am_pm_name' style='width:90px;float:right;'>
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="friday_box" value="5"> Friday
			</td>
			<td>
				<input type="text" class="form-control" placeholder="Time (ex: 7:00)" name='friday_time_name' maxlength='5' style='width:120; float:left;'>
			
				<select class="form-control" name='friday_am_pm_name' style='width:90px;float:right;'>
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</td>
		</tr>
	</table>
	<br><br>
	<textarea class="form-control" style='width:90%;' rows='12' placeholder='Descriptions of the class (optional)' name='textarea_submit'></textarea>
	<br><br>
	<input class="btn btn-lg btn-primary btn-block" type="submit" name='submit' value='Create Classroom'>
</form>
<br>
</center>


</div>

</body>
</html>