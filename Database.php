<?php

$servername = "localhost";
$username = "ducafe";
$password = "ducafe_db";
$dbname = "ducafe";
/*
$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";*/

//create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($db -> connect_error){
    die("connection failed ".$db->connect_error);
}
?>