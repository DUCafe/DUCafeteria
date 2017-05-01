<?php


$username = $_GET["name"];
$password = $_GET["password"];

session_start();
$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";

$db = mysqli_connect($servername, $username, $password, $dbname);

if ($db -> connect_error){
    die("connection failed ".$db->connect_error);
}

else echo "connection established";

    $password = md5($password);



    $retrieve_query = "SELECT * FROM MYTABLE where name = '$username' AND password='$password'";


    $result = $db->query($retrieve_query);
    $row = $result->num_rows;

    echo $result['password'];


    if($row == 1)
    {

        session_start();
        $_SESSION['login_user'] = $username;
        echo "<br>Successfully logged in.<br>";

        header("location:profile.php");
    }

?>