<html>

<title>Logged Out</title>
<?php 
session_start();	

session_destroy();

echo "You have been logged out. <a href= 'index.php'>Click here</a> to return.";

header('Location: index.html');

?>


</html>