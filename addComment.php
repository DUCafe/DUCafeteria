<?php

session_start();
$name;
if(!isset($_SESSION['login_user']))
{
    $name = 'false';
}
else
    $name = $_SESSION['login_user'];

require ('Database.php');

    //$name = "fahim";
    //$name = $_SESSION['login_user'];
    $cid = $_GET['cid'];
    $review = $_GET['review'];
    $menuname = $_GET['menuname'];

    $date = date('Y-m-d H:i:s');

    $r_query = "INSERT INTO comment(username, canteenid, review, menuname)
		VALUES ('$name', '$cid', '$review', '$menuname')";
    $res = $db->query($r_query);

    if ($res == true) {
        echo "success";
    }
    else echo "failed";

//echo "supress";

?>