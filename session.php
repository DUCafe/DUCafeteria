<?php
	$servername = "localhost";
	$username = "root";
	$password = "102938";
	$dbname = "users";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	if ($db -> connect_error){
		die("connection failed ".$db->connect_error);
	}

	session_start();// Starting Session
	
	// Storing Session
	$user_check=$_SESSION['login_user'];
	//echo "<br>Welcome $user_check<br>";
	
	// SQL Query To Fetch Complete Information Of User
	$retrieve_query = "SELECT username FROM MYTABLE where username = '$user_check'";
	$result = $db->query($retrieve_query);
	
	$row = $result->fetch_assoc();
	$login_session =$row['username'];
	
	/*if(!isset($login_session)){
		db->close(); // Closing Connection
		//header('Location: loginUserDB.php'); // Redirecting To Home Page
	}*/
?>
