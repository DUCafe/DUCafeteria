	<?php
		//session_start();
	$servername = "localhost";
	$username = "root";
	$password = "102938";
	$dbname = "users";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	if ($db -> connect_error){
		die("connection failed ".$db->connect_error);
	}

	//success message
	//echo "connected."."<br>";

	

	$value = "";
		//if(isset($_GET['login_button']))

		
	
		$username1 = $_GET['username1'];
		$password1 = md5($_GET['password1']);
	
		$retrieve_query = "SELECT * FROM MYTABLE where username = '$username1' AND password = '$password1'";
		$count_query = "SELECT COUNT(*) FROM MYTABLE WHERE username = '$username1'";

		$result = $db->query($retrieve_query);
		$counter = $result->num_rows;
		//$row = $result->num_rows;

			if($counter > 0)
			{
				$_SESSION['login_user'] = $username1;
				$value = "Success";
			}
			else $value = "Failure" ;

    echo "$value";

	?>



























