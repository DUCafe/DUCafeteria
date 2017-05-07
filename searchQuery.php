<?php require ('Database.php'); ?>
<?php
session_start();

$value = "default";

if($_SERVER['REQUEST_METHOD'] === 'GET') {

    $canteenname1 = $_GET['canteenname1'];

    $retrieve_query = "SELECT * FROM canteen where canteenname = '$canteenname1'";
    //$count_query = "SELECT COUNT(*) FROM MYTABLE WHERE username = '$username1'";

    $result = $db->query($retrieve_query);
    $counter = $result->num_rows;

    //$row = $result->num_rows;

    if ($counter > 0) {
        $_SESSION['search'] = $canteenname1;
        $value = "Success";

    } else $value = "Failure";
}
echo "$value";

?>



























