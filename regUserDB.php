
<?php require ('Database.php'); ?>
<?php

$val = "";

if($_SERVER['REQUEST_METHOD'] === 'GET')
{

	$username1 = $_GET["username1"];
	$email1 = $_GET['email1'];
	$password1 = $_GET['password1'];
	$password2 = $_GET['password2'];
	$reg = $_GET['reg'];

	//$password1 = md5($password1);

	$retrieve_query = "SELECT * FROM regtable WHERE regnumber='$reg'";
	$count11 = $db->query($retrieve_query);
	$count22 = $count11->num_rows;


    $retrieve_query = "SELECT * FROM MYTABLE WHERE email='$email1' AND password=md5('$password1')";
    $count1 = $db->query($retrieve_query);
    $count2 = $count1->num_rows;


	
	if($count2 == 0 && $count22 == 1 && $password1 == $password2)
	{
		$password1 = md5($password1);
		$ins_data = "INSERT INTO MYTABLE (username, email, password)
		VALUES ('$username1', '$email1', '$password1')";
		$res = $db->query($ins_data);

		if($res == true)
		{

			$val = "Success";
            /*$info = pathinfo($_FILES['userFile']['name']);
            $ext = $info['extension']; // get the extension of the file
            $newname = "newname.".$ext;

            $target = 'http://localhost/images/'.$newname;
            move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);*/

		}
	}
	else if($count22 == 0)
	{
        $val = "reg";
	}
	echo "$val";
}
?>




