<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/showNames.js"></script>
</head>
<link rel="stylesheet" href="showname.css">
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
        <tr class='clickable-row' data-href='"findMenu.php?canteenname="+name+"&id=2"'>
            <td><?php echo $name; ?></td>
        </tr>
<?php

}
?>
</table>
