<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">


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

<title>Manage Your Classes</title>

<body>
<center>
<div class="container" style='width:70%;'>
<h1>Manage Your Classes</h1>
<div class="panel panel-danger" style='width:100%;'>
		<div class="panel-heading">Classes</div>
			<div class="panel-body">

				<table class='table table-striped table-bordered table-condensed'>
				<?php 

				$my_class_query = mysql_query("SELECT class FROM relationship WHERE user='$my_id'");
				
				while($row_my_class = mysql_fetch_array($my_class_query)){

					$class_id = $row_my_class['class'];
					
					$course_query = mysql_query("SELECT course FROM class WHERE id='$class_id'"); 
					$row_course = mysql_fetch_assoc($course_query);
					$class_course = $row_course['course'];
					
					$professor_query = mysql_query("SELECT professor FROM class WHERE id='$class_id'"); 
					$row_professor = mysql_fetch_assoc($professor_query);
					$class_prof = $row_professor['professor'];
					
					$semester_query = mysql_query("SELECT semester FROM class WHERE id='$class_id'"); 
					$row_semester = mysql_fetch_assoc($semester_query);
					$class_semester = $row_semester['semester'];
					
					$day_query = mysql_query("SELECT day FROM class WHERE id='$class_id'"); 
					$row_day = mysql_fetch_assoc($day_query);
					$class_day = $row_day['day'];
					
					if($class_day==1){
						$class_day='Monday';
					}
					if($class_day==2){
						$class_day='Tuesday';
					}
					if($class_day==3){
						$class_day='Wednesday';
					}
					if($class_day==4){
						$class_day='Thursday';
					}
					if($class_day==5){
						$class_day='Friday';
					}
					
					$year_query = mysql_query("SELECT year FROM class WHERE id='$class_id'"); 
					$row_year = mysql_fetch_assoc($year_query);
					$class_year = $row_year['year'];
					
					$time_query = mysql_query("SELECT time FROM class WHERE id='$class_id'"); 
					$row_time = mysql_fetch_assoc($time_query);
					$class_time = $row_time['time'];
					
					$description_query = mysql_query("SELECT description FROM class WHERE id='$class_id'"); 
					$row_description = mysql_fetch_assoc($description_query);
					$class_description = $row_description['description'];
					
					$check_green_but = mysql_num_rows(mysql_query("SELECT * FROM relationship WHERE class='$class_id' && user='$my_id'"));

				?>
					
					<tr>
						<td colspan="2" style='background-color:#F78181;'><center><a href='class.php?i=<?php echo $class_id;?>'><font style='color:#F2F2F2;'><b><u><?php echo $class_course;?></u></b></a></center> <center><?php echo $class_prof;?></font></center> </td>
					</tr>
					<tr>
						<td>Semester: <?php echo $class_semester;?></td>
						<td>Time: <?php echo $class_time;?></td>
					</tr>
					<tr>
						<td>Day: <?php echo $class_day;?></td>
						<td>Year: <?php echo $class_year;?></td>
					</tr>
					<tr>
						<td colspan="2">
							<form action='button_quit.php' method='post'>
							<div style='float:right;'><a href='class.php?i=<?php echo $class_id;?>' target='_blank'><button type="button" class="btn btn-info">See inside</button></a> 
									<input type='hidden' name='classidhide' value='<?php echo $class_id;?>'>
									<button type="submit" name="quit_class_but" class="btn btn-danger" value='1'>Quit Class</div></button>						
							</div>
							</form>
						</td>
												
					</tr>

					
				<?php 
				}
				?>
				</table>
			</div>
		</div>
	</div>
</div>
</center>

</body>

</html>