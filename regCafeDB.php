
<?php

$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";

//create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($db -> connect_error){
    die("connection failed ".$db->connect_error);
}

//success message
//echo "connected successfully"."<br>";

/*$alter = "ALTER TABLE MYTABLE
		  MODIFY COLUMN password VARCHAR(100) NOT NULL";
$db->query($alter);*/

$val = "";

//if($_SERVER['REQUEST_METHOD'] === 'GET')
{

    $adminid = $_GET["adminid"];
    $adminname = $_GET['adminname'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $password1 = $_GET['password1'];
    $password2 = $_GET['password2'];


    $retrieve_query = "SELECT * FROM admin where adminid = '$adminid' AND password='$password1'";
    $count = $db->query($retrieve_query);
    $count = $count->num_rows;

    if($count ==0 && $password1 == $password2)
    {
        $password1 = md5($password1);
        $ins_data = "INSERT INTO admin (adminid, adminname, address, phone, email, password)
		VALUES ('$adminid', '$name', '$address', '$phone', '$email', '$password1')";
        $res = $db->query($ins_data);

        if($res == true)
        {

            $val = "Success";
            $create_cafe="CREATE TABLE $username1 (
					id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					username VARCHAR(11) NOT NULL,
					email VARCHAR(100) NOT NULL,
					password VARCHAR(11) NOT NULL";
        }
    }
    else
        $val = "Failed";
    echo "$val";
}
?>




