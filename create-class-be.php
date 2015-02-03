<?php 
include 'connect.php';
include 'general.php';
include 'sessioncheck.php';

$course = $_POST['course_name'];
$professor = $_POST['professor_name'];
$semester = $_POST['semester_name'];
$year = $_POST['year_name'];
$description = nl2br(strip_tags($_POST['textarea_submit']));

$monday = $_POST['monday_box'];
$tuesday = $_POST['tuesday_box'];
$wednesday = $_POST['wednesday_box'];
$thursday = $_POST['thursday_box'];
$friday = $_POST['friday_box'];


$monday_time = strip_tags($_POST['monday_time_name']);
$tuesday_time = strip_tags($_POST['tuesday_time_name']);
$wednesday_time = strip_tags($_POST['wednesday_time_name']);
$thursday_time = strip_tags($_POST['thursday_time_name']);
$friday_time = strip_tags($_POST['friday_time_name']);

$monday_am_pm = $_POST['monday_am_pm_name'];
$tuesday_am_pm = $_POST['tuesday_am_pm_name'];
$wednesday_am_pm = $_POST['wednesday_am_pm_name'];
$thursday_am_pm = $_POST['thursday_am_pm_name'];
$friday_am_pm = $_POST['friday_am_pm_name'];

if($monday_time!=''){
	$monday_time = $monday_time." ".$monday_am_pm;
}
if($tuesday_time!=''){
	$tuesday_time = $tuesday_time." ".$tuesday_am_pm;
}
if($wednesday_time!=''){
	$wednesday_time = $wednesday_time." ".$wednesday_am_pm;
}
if($thursday_time!=''){
	$thursday_time = $thursday_time." ".$thursday_am_pm;
}
if($friday_time!=''){
	$friday_time = $friday_time." ".$friday_am_pm;
}

if($monday!=''||$tuesday!=''||$wednesday!=''||$thursday!=''||$friday!=''){
	if ($monday!=''){
		$time =$monday_time;
		$day=$monday;
		
		$class_copy_check = mysql_num_rows(mysql_query("SELECT * FROM class WHERE professor='$professor' && time='$time' && year='$year' && semester='$semester' && day='$day'"));

		if ($class_copy_check == 0){
			if($course && $professor && $semester && $day && $time && $year){
				mysql_query("INSERT INTO class VALUE('','$course','$professor','$semester','$day','$year','$time','$description','$my_id',now(),now())") or die("There was a problem creating your class.");
				
				$topic_id_query = mysql_query("SELECT id FROM class WHERE course='$course' && professor='$professor' && year='$year' && description='$description' && semester='$semester'");
				$row_topic_id = mysql_fetch_assoc($topic_id_query);
				$topic_id = $row_topic_id['id'];
				
				echo 'You successfully created your topic for Monday. <br><a href="class.php?i='.$topic_id.'">Click here to see your class</a><br>';
				
				
			} else {
				echo 'You need to fill out ALL information!<br>';
			}
		} else {
			echo "Someone already made a topic about your class for Monday<br>";
		}
	}

	if ($tuesday!=''){
		$time =$tuesday_time;
		$day=$tuesday;
		
		$class_copy_check = mysql_num_rows(mysql_query("SELECT * FROM class WHERE professor='$professor' && time='$time' && year='$year' && semester='$semester' && day='$day'"));

		if ($class_copy_check == 0){
			if($course && $professor && $semester && $day && $time && $year){
				mysql_query("INSERT INTO class VALUE('','$course','$professor','$semester','$day','$year','$time','$description','$my_id',now(),now())") or die("There was a problem creating your class.");
				
				$topic_id_query = mysql_query("SELECT id FROM class WHERE course='$course' && professor='$professor' && year='$year' && description='$description' && semester='$semester'");
				$row_topic_id = mysql_fetch_assoc($topic_id_query);
				$topic_id = $row_topic_id['id'];
				
				echo 'You successfully created your topic for Tuesday. <br><a href="class.php?i='.$topic_id.'">Click here to see your class</a><br>';
				
				
			} else {
				echo 'You need to fill out ALL information!<br>';
			}
		} else {
			echo "Someone already made a topic about your class for Tuesday.<br>";
		}
	}

	if ($wednesday!=''){
		$time =$wednesday_time;
		$day=$wednesday;
		
		$class_copy_check = mysql_num_rows(mysql_query("SELECT * FROM class WHERE professor='$professor' && time='$time' && year='$year' && semester='$semester' && day='$day'"));

		if ($class_copy_check == 0){
			if($course && $professor && $semester && $day && $time && $year){
				mysql_query("INSERT INTO class VALUE('','$course','$professor','$semester','$day','$year','$time','$description','$my_id',now(),now())") or die("There was a problem creating your class.");
				
				$topic_id_query = mysql_query("SELECT id FROM class WHERE course='$course' && professor='$professor' && year='$year' && description='$description' && semester='$semester'");
				$row_topic_id = mysql_fetch_assoc($topic_id_query);
				$topic_id = $row_topic_id['id'];
				
				echo 'You successfully created your topic for Wednesday. <br><a href="class.php?i='.$topic_id.'">Click here to see your class</a><br>';
				
				
			} else {
				echo 'You need to fill out ALL information!<br>';
			}
		} else {
			echo "Someone already made a topic about your class for Wednesday.<br>";
		}
	}

	if ($thursday!=''){
		$time =$thursday_time;
		$day=$thursday;
		
		$class_copy_check = mysql_num_rows(mysql_query("SELECT * FROM class WHERE professor='$professor' && time='$time' && year='$year' && semester='$semester' && day='$day'"));

		if ($class_copy_check == 0){
			if($course && $professor && $semester && $day && $time && $year){
				mysql_query("INSERT INTO class VALUE('','$course','$professor','$semester','$day','$year','$time','$description','$my_id',now(),now())") or die("There was a problem creating your class.");
				
				$topic_id_query = mysql_query("SELECT id FROM class WHERE course='$course' && professor='$professor' && year='$year' && description='$description' && semester='$semester'");
				$row_topic_id = mysql_fetch_assoc($topic_id_query);
				$topic_id = $row_topic_id['id'];
				
				echo 'You successfully created your topic for Thursday. <br><a href="class.php?i='.$topic_id.'">Click here to see your class</a><br>';
				
				
			} else {
				echo 'You need to fill out ALL information!<br>';
			}
		} else {
			echo "Someone already made a topic about your class for Thursday.<br>";
		}
	}

	if ($friday!=''){
		$time =$friday_time;
		$day=$friday;
		
		$class_copy_check = mysql_num_rows(mysql_query("SELECT * FROM class WHERE professor='$professor' && time='$time' && year='$year' && semester='$semester' && day='$day'"));

		if ($class_copy_check == 0){
			if($course && $professor && $semester && $day && $time && $year){
				mysql_query("INSERT INTO class VALUE('','$course','$professor','$semester','$day','$year','$time','$description','$my_id',now(),now())") or die("There was a problem creating your class.");
				
				$topic_id_query = mysql_query("SELECT id FROM class WHERE course='$course' && professor='$professor' && year='$year' && description='$description' && semester='$semester'");
				$row_topic_id = mysql_fetch_assoc($topic_id_query);
				$topic_id = $row_topic_id['id'];
				
				echo 'You successfully created your topic for Friday. <br><a href="class.php?i='.$topic_id.'">Click here to see your class</a><br>';
				
				
			} else {
				echo 'You need to fill out ALL information!<br>';
			}
		} else {
			echo "Someone already made a topic about your class for Friday.<br>";
		}
	}
} else {
	die("You need to choose at least a day.");
}
?>