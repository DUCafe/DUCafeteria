<?php
require ('Database.php');

$id = $_GET['id'];

$retrieve_query = "SELECT * FROM canteen" ;
if($retrieve_query == null)
    echo "false";
$result = $db->query($retrieve_query);

$usernames = array();
$i = 0;

while( $r = $result->fetch_assoc() ) {
    $usernames[$i] = $r['canteenname'];
    $locations[$i] = $r['location'];
    $i++;
}
if($id == 2)
{
    echo json_encode($locations);
}
else
    echo json_encode($usernames);
?>


