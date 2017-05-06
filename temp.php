<?php
require ('Database.php');

$retrieve_query = "SELECT * FROM canteen" ;
$result = $db->query($retrieve_query);

$locations = array();
$i = 0;

while( $r = $result->fetch_assoc() ) {
    $locations[$i] = $r['location'];
    $i++;
}


?>

<!DOCTYPE html>
<html>
<head>header</head>
<script type="text/javascript">

    $( function()
    {
        locations =  <?php
        echo json_encode($locations);
        ?>  ;

        $( "#tags" ).autocomplete({
            source: locations
        });
    });



</script>


<body>

    <p>why <?php echo "$result" ?></p>
    <img src="<?php echo "$result" ?>" alt="testing"/>

</body>
</html>


