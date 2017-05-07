<?php
require ('Database.php');
session_start();

$value = "default";
//echo "$value";


$username1 = $_GET['username1'];
$password1 = md5($_GET['password1']);


$retrieve_query = "SELECT * FROM admin where adminid = '$username1' AND password = '$password1'";
$count_query = "SELECT COUNT(*) FROM admin WHERE adminid = '$username1'";


$result = $db->query($retrieve_query);
$counter = $result->num_rows;
//echo $counter;
//$row = $result->num_rows;

if($counter > 0)
{
    $_SESSION['login_user'] = $username1;
    $value = "Success";
}
else $value = "Failure" ;

echo "$value";

?>



























