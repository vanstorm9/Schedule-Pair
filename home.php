<!DOCTYPE html>
<html lang="en">



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="css/favicon.ico">
    <title>Course Search</title>

    <!-- Bootstrap -->
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.mi.css" rel="stylesheet">
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
 <?php 
require 'connect.php';
include 'general.php';
include 'navbar.html';
include 'sessioncheck.php';

$logindate = date("Y-m-d");
$recenttime = date('H:i:s');

mysql_query("UPDATE users SET last_date= '$logindate', last_time = '$recenttime' WHERE id='$my_id'");

?>
  

<div class='container'>
	<center>
	<div class="panel panel-danger" style='width:80%;'>
		<div class="panel-heading">Schedule Pair Search</div>
			<div class="panel-body">
			
			Click on the search button to see all class topics that was created on the search engine.<br>
			If your course is not there, click on the create class button and create the class topic to see who are a part of the class (see who joins the class topic).
			<center>
			<form method='post' action='home.php'>
				<table class='table'>
					<tr>
						<td>
							<input type="text" class="form-control" placeholder="Course Name" name='course_name' >
						</td>
						<td>
							<input type="text" class="form-control" placeholder="Professor Name" name='professor_name' >
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
							<select class="form-control" name='day_name'>
							<option value="" disabled selected>Choose Day</option>
							<option value="1">Monday</option>
							<option value="2">Tuesday</option>
							<option value="3">Wednesday</option>
							<option value="4">Thursday</option>
							<option value="5">Friday</option>
							<option value="6">Saturday</option>
							<option value="7">Sunday</option>
						</select>
						</td>
						<td>
							<input type="text" class="form-control" placeholder="Time" name='time_name' >
						</td>						
						<td>
							<input type="text" class="form-control" placeholder="Year" name='year_name' >
						</td>
					
					</tr>
				</table>
				
				<input class="btn btn-lg btn-primary btn-block" type="submit" name='submit' value='Search Class'>
			</form>
			</center>
			</div>
	</div>
	</div> 
	
	
			
	
	<br>
	
<center>
<?php 
if($_POST['submit']){
?>
	<div class="panel panel-danger" style='width:85%;'>
		<div class="panel-heading">Classes</div>
			<div class="panel-body">
			
			<div style='margin-bottom:10px;float:left;'>
				<a href='create-class.php'><button type="button" id="join_class_but"  class="btn btn-success btn-lg" style='200px;'>Create a Class</button></a>
			</div>
			<br>
			<table class="table table-striped table-bordered table-condensed">
		
			<?php			    
				$course = $_POST['course_name'];
				$professor = $_POST['professor_name'];
				$semester = $_POST['semester_name'];
				$day = $_POST['day_name'];
				$time = $_POST['time_name'];
				$year = $_POST['year_name'];
				
				$first_name = $_POST['first_name'];				
				$last_name = $_POST['last_name'];
				
				$submit = $_POST['submit'];
			
				
				$i=0;

					$search_1_query = mysql_query("SELECT id, course, professor, semester, day, time, year, description, creator_id, last_date, last_time FROM class 
					WHERE course LIKE '{$course}%' 
					&& professor LIKE '{$professor}%' 
					&& semester LIKE '{$semester}%' 
					&& day LIKE '{$day}%'
					&& time LIKE '{$time}%' 
					&& year LIKE '{$year}%' 
					ORDER BY id desc;
					");
					
					$class_exist_check = mysql_num_rows($search_1_query);
					
					if($class_exist_check!=0){
					
						while($search_row = mysql_fetch_array($search_1_query)){
							$class_id = $search_row['id'];
							$class_course = $search_row['course'];
							$class_prof = $search_row['professor'];
							$class_semester = $search_row['semester'];
							$class_day = $search_row['day'];
							$class_time = $search_row['time'];
							$class_year = $search_row['year'];
							$class_description = $search_row['description'];
							$class_creator_id = $search_row['creator_id'];
							$class_last_date = $search_row['last_date'];
							$class_last_time = $search_row['last_time'];
							
							
							
							if ($class_semester == 1){
								$class_semester ='1st';
							} else if ($class_semester == 2){
								$class_semester ='2nd';
							}
							
							
							if ($class_day == 1){
								$class_day_name = 'Monday';
							} else if ($class_day == 2){
								$class_day_name = 'Tuesday';
							} else if ($class_day == 3){
								$class_day_name = 'Wednesday';
							} else if ($class_day == 4){
								$class_day_name = 'Thursday';
							} else if ($class_day == 5){
								$class_day_name = 'Friday';
							} else if ($class_day == 6){
								$class_day_name = 'Saturday';
							} else if ($class_day == 7){
								$class_day_name = 'Sunday';
							}
							
							
					
							
									?>
									
									<tr>
										<td colspan="2" style='background-color:#F78181;'><center><a href='class.php?i=<?php echo $class_id;?>'><font style='color:#F2F2F2;'><b><u><?php echo $class_course;?></u></b></a></center> <center><?php echo $class_prof;?></font></center> </td>
									</tr>
									<tr>
										<td>Semester: <?php echo $class_semester;?></td>
										<td>Time: <?php echo $class_time;?></td>
									</tr>
									<tr>
										<td>Day: <?php echo $class_day_name;?></td>
										<td>Year: <?php echo $class_year;?></td>
									</tr>
									<tr>
										<td colspan="2"><div style='float:right;'><a href='class.php?i=<?php echo $class_id;?>' target='_blank'><button type="button" class="btn btn-info">See inside</button></a> 
									
									</tr>
									

								
															
								<?php
						
							$i++;

						
						}
					} else {
						echo '<br>There are no classes for that search result';
					}
			
				
	
}				 
				?>
				
				
					
					
				
				
				</table>
			
			
			</div>
	</div>
	</div>

				</table>
			
			
			</div>
	</div>
	</div>
</center>
</center>
</center>
	

	
	
	

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/autocomplete.js"></script>
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 



	
	
<script type="text/javascript"> 

	function load(adiv_tag, recieving_id){									
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				<?php 
				$search_query = mysql_query("SELECT * FROM search_info WHERE user_id!='$user_id'");

				$j = 0;
				while($search_row = mysql_fetch_array($search_query)){	
				?>
					if (adiv_tag == <?php echo $j; ?>){
						
						document.getElementById("adiv_<?php echo $j;?>").innerHTML =  xmlhttp.responseText;
					}
				<?php
					$j++;
				}
				
				?>
				
				
			}
										
		}
										
	xmlhttp.open('GET','include.inc.php?i=' + recieving_id, true);
	xmlhttp.send();

}

</script>
</html>