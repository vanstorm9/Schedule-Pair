<?php 
	include 'connect.php';

	$submit = strip_tags($_POST['submit']);
	$firstname = strip_tags($_POST['first_name']);
	$lastname = strip_tags($_POST['last_name']);
	$email = strip_tags($_POST['email_box']);
	$major = strip_tags($_POST['major_box']);
	$username = strip_tags($_POST['email_box']);
	$password = strip_tags($_POST['password_box']);
	$repeatpassword = strip_tags($_POST['re_password_box']);
	$date = date("Y-m-d");
	$logindate = date("Y-m-d");
	$recenttime = date('H:i:s');
	$class_of = strip_tags($_POST['class_box']);
	$rutgers_type = $_POST['rutgers_box'];


	
	if($rutgers_type==1){
		$rutgers_type = 5;
	
	} else if ($rutgers_type==2){
		$rutgers_type = 19;

	} else if ($rutgers_type==3){
		$rutgers_type = 20;

	}
	
	
	
	
	$firstname = mysql_real_escape_string($firstname);
	$lastname = mysql_real_escape_string($lastname);
	$email = mysql_real_escape_string($email);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$fullname=$firstname." ".$lastname;
	
	

	
	if ($submit){
		
                
                $namecheck= mysql_query("SELECT email FROM users WHERE email='$username'");
                $count = mysql_num_rows($namecheck);


                if ($count!=0){
                die("Email was already taken");
                }

		if ($username&&$firstname&&$lastname&&$email&&$password&&$repeatpassword){
		if($class_of!=''||$rutgers_box!='' || $major!=''){
			if ($password == $repeatpassword){
				

					if (strlen($password) > 25 || strlen($password) < 6){
						echo "Your password must be between 6-25 characters!";
						
					} else {
						$password = md5($password);
						$repeatpassword =md5($repeatpassword);
						
						
						
						if (isset($_POST['email_box']) == true && empty($_POST['email_box']) == false){
				
							if (filter_var($email, FILTER_VALIDATE_EMAIL) == true){
								
							} else {
								die("Sorry, you typed in an invalid email address");
							}
						
						} else {
							die("You need to type in your email address.");
						
						}
						
						$random = rand(23456789,98765432);
						$check_major_copy = mysql_num_rows(mysql_query("SELECT * FROM major WHERE name='$major'"));
					
						if($check_major_copy == 0){
							mysql_query("INSERT major VALUE('','$major','','','','','0','0')") or die("There was a problem with your registration (Code:M5)");
							$major_ch = mysql_insert_id();
						} else {
							$major_query = mysql_query("SELECT id FROM major WHERE name='$major'") or die("There was a problem with your registration (Code:M6)");
							$row_major = mysql_fetch_assoc($major_query);
							$major_ch = $row_major['id'];
						}
						
						mysql_query("INSERT users VALUE ('','$email','$password','$firstname','$lastname','$fullname','$class_of','uni','$rutgers_type','$major_ch','$email',now(),'$random','http://goo.gl/RaEt9Z','','','','','0')") or die("There was a problem registrating your account. Please contact antlowhur@yahoo.com");
	
						

                                                $lastid = mysql_insert_id();

                                                $to= $email;
                                                $subject= "Activate your Schedule Pair account";
                                                $headers= "From: Anthony Lowhur";
                                                $body = "Hello $firstname
Thanks for creating an account for the Schedule Pair app account! You are one click way from finding out who is in your classes! Activate your account by clicking on the link below:
http://schedule-group.site50.net/activate.php?p=$lastid&o=$random

Thank you!
Anthony Lowhur
Founder of the Rutgers Roommate Search Engine";


                                                if (mail($to, $subject, $body, $headers)){
						
												die("You have been registered. Check your email to activate your account.");
                                                } else {
                                                 die("Sorry, there was a failure in sending your activation email.");
                                                }
						
					
					}
					
				
			} else {
				echo "Your passwords do not match!";
			}
			
		} else {
			echo "Please fill in <strong>ALL</strong> of the fields";
		}
		} else {
			echo "Please fill in <strong>ALL</strong> fields";
		}
		
	} else {
		echo 'Page Load Error';
	}
	


?>

