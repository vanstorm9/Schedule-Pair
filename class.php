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
	require 'general.php';
	include 'navbar.html';
	include 'sessioncheck.php';
	
	$class_id = $_GET['i'];
	$class_name = $_GET['q'];

	$professor_query = mysql_query("SELECT professor FROM class WHERE id='$class_id'"); 
	$row_professor = mysql_fetch_assoc($professor_query);
	$professor = $row_professor['professor'];
	
	$course_query = mysql_query("SELECT course FROM class WHERE id='$class_id'"); 
	$row_course = mysql_fetch_assoc($course_query);
	$course = $row_course['course'];
	
	$semester_query = mysql_query("SELECT semester FROM class WHERE id='$class_id'"); 
	$row_semester = mysql_fetch_assoc($semester_query);
	$semester = $row_semester['semester'];
	
	$description_query = mysql_query("SELECT description FROM class WHERE id='$class_id'"); 
	$row_description = mysql_fetch_assoc($description_query);
	$description = $row_description['description'];
	
	$day_query = mysql_query("SELECT day FROM class WHERE id='$class_id'"); 
	$row_day = mysql_fetch_assoc($day_query);
	$day = $row_day['day'];
	
	if($day==1){
		$day='Monday';
	}
	if($day==2){
		$day='Tuesday';
	}
	if($day==3){
		$day='Wednesday';
	}
	if($day==4){
		$day='Thursday';
	}
	if($day==5){
		$day='Friday';
	}
	
	$time_query = mysql_query("SELECT time FROM class WHERE id='$class_id'"); 
	$row_time = mysql_fetch_assoc($time_query);
	$original_time = $row_time['time'];
	
	$time = date("g:i:s a", strtotime($original_time));
	
	
	$year_query = mysql_query("SELECT year FROM class WHERE id='$class_id'"); 
	$row_year = mysql_fetch_assoc($year_query);
	$original_year = $row_year['year'];
	
	$originalDate = $original_year;
	$year = date("m/d/Y", strtotime($originalDate));
	
	$check_green_but = mysql_num_rows(mysql_query("SELECT * FROM relationship WHERE class='$class_id' && user='$my_id'"));
	 
	
	
	?>
</head>

<title><?php echo $course;?></title>


<div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			<h2 class="form-signin-heading" style='color:black;'>Who is in this class</h2>
				<div id="" style="overflow-y: scroll; height:200px;">
					<center>
						<table class='table bordered-table'>
							<?php 
								$in_this_class_query = mysql_query("SELECT * FROM relationship WHERE class='$class_id'");
									  
								while($row_in_this_class = mysql_fetch_array($in_this_class_query)){
									$user_id = $row_in_this_class['user'];
									
									$firstname_query = mysql_query("SELECT firstname FROM users WHERE id='$user_id'");
									$firstname_row = mysql_fetch_assoc($firstname_query);
									$first_name = $firstname_row['firstname'];
									
									$lastname_query = mysql_query("SELECT lastname FROM users WHERE id='$user_id'");
									$lastname_row = mysql_fetch_assoc($lastname_query);
									$last_name = $lastname_row['lastname'];
									
									$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$user_id'");
									$avatar_row = mysql_fetch_assoc($avatar_query);
									$avatar = $avatar_row['avatar'];
											  
									?>
											  
									<tr>
										<td>
											<img src='<?php echo $avatar;?>' style='width:70px;height:70px;'>
										</td>
										<td>
											<div style='margin-top:16px;'><font style='font-size: 150%;'><?php echo $first_name." ".$last_name;?></font></div>
										</td>
												
									</tr>
										  
										  
								 <?php
								 }
								?>
						</table>
					</center>
				</div>
			</div>	
  
		</div>
		<div class="modal-footer">
       
		</div>
	</div>
</div>


<body>
<center>
<h1><?php echo $course;?></h1>
Taught by <?php echo $professor;?>
<div class="container" style='width:70%;'>
<br>

<div class="panel panel-danger" style='width:100%;'>
		<div class="panel-heading">Class Information</div>
			<div class="panel-body">
				<table class='table'>
					<tr>
						<td colspan='2'>
						<?php 
						if ($check_green_but == 0){
						?>
							<center><button type="button" id="join_class_but" onclick="load(<?php echo $class_id;?>)" class="btn btn-success btn-lg" style='width:70%;'><span class="glyphicon glyphicon-plus"></span> Join Class</button></center>
						<?php 
						} else {
						?>
							<center><button type="button" id="join_class_but" onclick="load(<?php echo $class_id;?>)" class="btn btn-success btn-lg" style='width:70%;'>Quit Class</button></center>
						<?php 
						}
						?>
						</td>
					</tr>
					<tr>
						<td>
							Semester: <?php echo $semester;?>
						</td>
						
						<td>
							Time: <?php echo $time;?>
						</td>

					</tr>
					
					<tr>

						<td>
							Day: <?php echo $day;?>
						</td>
						
						<td>
							Year: <?php echo $year;?>
						</td>
					</tr>
				</table>
			
					<u>Description:</u><br>
					<?php echo $description;?>
				
				</br><br>
				<a href='#classModal' data-toggle='modal'>See who is in this class</a>
			</div>
		</div>
	</div>
<br><br>
<center>
	<div style='width:75%;'>
		<table class='table table-bordered table-condensed'>	
		<?php 
		$post_query = mysql_query("SELECT id, message, post_sender, topic_id, date_sent, time_sent FROM post WHERE topic_id='$class_id'");
					
			while($row_post = mysql_fetch_array($post_query)){
				$post_id = $row_post['id'];
				$post_message = $row_post['message'];
				$post_sender = $row_post['post_sender'];
				$post_class_id = $row_post['topic_id'];
				$post_date_sent = $row_post['date_sent'];
				$post_time_sent = $row_post['time_sent'];
				
				$post_time_sent = date("g:i:s a", strtotime($post_time_sent));
				
				
				$originalDate = $post_date_sent;
				$post_date_sent = date("m/d/Y", strtotime($originalDate));
				
						
				$id_query = mysql_query("SELECT id FROM users WHERE id='$post_sender'");
				$id_row = mysql_fetch_assoc($id_query);
				$poster_id = $id_row['id'];
									
				$first_name_query = mysql_query("SELECT firstname FROM users WHERE id='$post_sender'");
				$first_name_row = mysql_fetch_assoc($first_name_query);
				$poster_first_name = $first_name_row['firstname'];
											

				$last_name_query = mysql_query("SELECT lastname FROM users WHERE id='$post_sender'");
				$last_name_row = mysql_fetch_assoc($last_name_query);
				$poster_last_name = $last_name_row['lastname'];

				$avatar_query = mysql_query("SELECT avatar FROM users WHERE id='$post_sender'");
				$avatar_row = mysql_fetch_assoc($avatar_query);
				$poster_avatar = $avatar_row['avatar'];
				?>
			<tr>
				<td style='width:90px;'><center><img src='<?php echo $poster_avatar;?>' style='height:80px;width:80px;'/></center></td>
				<td>
					<table>
					
						<tr>
							<td><u><?php echo $poster_first_name." ".$poster_last_name;?></u> | Date: <?php echo $post_date_sent;?> | Time: <?php echo $post_time_sent;?></td>
						</tr>
						<tr>
							<td><br><?php echo $post_message;?></td>
						</tr>
					
					</table>
				</td>
			</tr>
		
		<?php 
		}
		?>
		</table>
	</div>
</center>
<br><br>
<form action='classpost.php' method='post'>
	<textarea class="form-control" style='width:65%;' rows='6' placeholder='Say "Hi" to your future classmates!' name='comment_box'></textarea>
	<br>
	<input class="btn btn-lg btn-primary btn-block" type="submit" name='submit' value='Post Comment' style='width:45%;'>
	<input type='hidden' name='topic_div' value='<?php echo $class_id;?>'>

	</form>
<br><br>
	
</div>
<center/>



</body>


<script>

function load(recieving_id){ 
    $.get('add.php?i=' + recieving_id, function(data) {
        $("#join_class_but").html(data);
		$(this).prop('disabled', true);
    });
	
}

	
</script>

</html>