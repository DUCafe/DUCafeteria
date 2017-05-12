<?php

$servername = "localhost";
$username = "ducafe";
$password = "ducafe_db";
$dbname = "ducafe";


//create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($db -> connect_error){
    die("connection failed ".$db->connect_error);
}
?>