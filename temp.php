<?php
require ('Database.php');

$retrieve_query = "SELECT location FROM canteen where adminid='testid2' " ;
$temp = $db->query($retrieve_query);

$row= $temp->fetch_assoc();
$result = $row["location"];
$result = str_replace("/var/www/html/FoodPage/","","$result");

/*$result = "<table>";

while($row = $temp->fetch_assoc()){
    $result = $result . "<tr><td>" . $row["location"] . "</td></tr>";

}
$result = $result . "</table>";*/

?>

<!DOCTYPE html>
<html>
<head>header</head>
<body>

    <p>why <?php echo "$result" ?></p>
    <img src="<?php echo "$result" ?>" alt="testing"/>



</body>
</html>


