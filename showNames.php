<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/showNames.js"></script>
</head>
<link rel="stylesheet" href="css/showname.css">
<html lang="en">

<table id="racetimes">
    <tr id="firstrow"><th>Cafe Name</th>

        <?php
        include ("Database.php");

$retrieve_query = "SELECT * FROM canteen" ;
if($retrieve_query == null)
    echo "false";
$result = $db->query($retrieve_query);

//$usernames = array();
//$i = 0;

while( $r = $result->fetch_assoc() ) {
    $name= $r['canteenname'];
    //$usernames[$i] = $r['CanteenName'];
    //$i++;
        ?>
        <tr>
        <td><a href=<?php echo "findMenu.php?canteenname=".$name."&id=2"?> > <?php echo "$name"?> </a></td>
        </tr>
<?php

}
?>
</table>
