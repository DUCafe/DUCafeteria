<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
	header("Location: RegLoginUser.php"); // Redirecting To Home Page
}
?>
