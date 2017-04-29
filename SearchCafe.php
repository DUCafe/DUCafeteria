<?php
    $servername = "localhost";
    $username = "root";
    $password = "102938";
    $dbname = "users";

    $db = mysqli_connect($servername, $username, $password, $dbname);

    if ($db -> connect_error){
        die("connection failed ".$db->connect_error);
    }

    $retrieve_query = "SELECT * FROM MYTABLE" ;
    $result = $db->query($retrieve_query);

    $usernames = array();
    $i = 0;

    while( $r = $result->fetch_assoc() ) {
        $usernames[$i] = $r['username'];
        $i++;
    }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<style>
    ul {
        list-style-type: none;
    }
</style>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <meta charset="UTF-8">
    <title>JavaScript tutorial</title>



    <script type="text/javascript">
        $( function()
        {
            userName =  <?php
            echo json_encode($usernames);
            ?>  ;

            $( "#tags" ).autocomplete({
                source: userName
            });
        });



    </script>
    <script type="text/javascript">
        function search() {
            var name = document.getElementById("tags").value;
            if(name.length > 0)
            {
                alert(name);
                window.location.href = "welcome.php";
            }
        }
    </script>
    </meta>

</head>
<body>
    <label for="tags">Tags: </label>
    <input id="tags" type="text">
    <input type="button" id="search" value = "Search" onclick="search()"/>


</body>
</html>



