<?php
require ('Database.php');

session_start();
$name;
if(!isset($_SESSION['login_user']))
{
    $name = 'nothing';
}
else
    $name = $_SESSION['login_user'];


$val = "";

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $arr = $_REQUEST["data"];
    $arr = json_decode($arr, true);
    $len = $_GET['len']-1;
    //echo "$len";
    echo $arr[0][0] ." ".$arr[0][1] ." ".$arr[0][2] ." ".$arr[0][3];

    // = "SELECT  FROM admin where adminid='$name'";
    $retrieve_query = "SELECT canteenid FROM canteen LEFT JOIN admin ON admin.adminid=canteen.adminid WHERE admin.adminid='$name'";
    //$count_query = "SELECT COUNT(*) FROM MYTABLE WHERE username = '$username1'";
    $result = $db->query($retrieve_query);

    $cid = $result->fetch_assoc();
    $cid = $cid['canteenid'];

    for($i=0; $i<$len; $i++) {
        $menuname = $arr[$i][0];
        $price = $arr[$i][1];
        $avlFrom = $arr[$i][2];
        $avlTo = $arr[$i][3];

        $ins_data = "INSERT INTO menu (menuname, price, canteenid, availableFrom, availableTo)
		VALUES ('$menuname', '$price', '$cid', '$avlFrom', '$avlTo')";
        $result = $db->query($ins_data);
        if($result == false)
        {
            $val = "Failed";
            break;
        }
    }
}
else
    $val = "Failed";

echo "$val";
?>
