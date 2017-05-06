<?php
/**
 * Created by PhpStorm.
 * User: rumaly
 * Date: 4/25/17
 * Time: 12:09 PM
 */

$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";

$db = mysqli_connect($servername, $username, $password, $dbname);

if ($db -> connect_error){

    die("connection failed ".$db->connect_error);
}


$retrieve_query = "SELECT * FROM canteen" ;
if($retrieve_query == null)
    echo "false";
$result = $db->query($retrieve_query);

$usernames = array();
$i = 0;

while( $r = $result->fetch_assoc() ) {
    $usernames[$i] = $r['canteenname'];
    $i++;
}

echo json_encode($usernames);

?>


