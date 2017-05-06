Header("content-type: application/javascript");
<?php
$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";

$db = mysqli_connect($servername, $username, $password, $dbname);

if ($db -> connect_error){
    die("connection failed ".$db->connect_error);
}

$retrieve_query = "SELECT * FROM canteen" ;
$result = $db->query($retrieve_query);

$usernames = array();
$i = 0;

while( $r = $result->fetch_assoc() ) {
    $usernames[$i] = $r['location'];
    $i++;
}



?>

<script type="text/javascript">

    function goto(location)
    {
        userName =  <?php
        echo json_encode($usernames);
        ?>  ;

        $( "#tags" ).autocomplete({
            source: userName
        });
    }

</script>
