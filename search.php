<?php
require ('Database.php');

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


