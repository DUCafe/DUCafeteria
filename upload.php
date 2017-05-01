<?php require ('Database.php'); ?>
<?php

print_r($_GET['adminid']);
//if (isset($_POST["register"]))
{

    $imagename = $_GET['imagename'];
    $imageid = $_GET['imageid'];

    print "$imagename";
    print "<br>$imageid";

    $uploaddir = '/var/www/html/FoodPage/';
    $uploadfile = $uploaddir . basename($_FILES['imagename']['name']);

    if (move_uploaded_file($_FILES['imagename']['tmp_name'], $uploadfile)) {
        $ins_data = "INSERT INTO canteen (adminid, canteenid, canteenname, location)
		VALUES ('testid2', 'testcid2', 'testname2', '$uploadfile')";

        $res = $db->query($ins_data);

        if($res == true)
        {
            header("Location:temp.php");
            exit;
            echo "Success";
        }



    } else {
        echo "Failed";
    }

    /*echo "</p>";
    echo '<pre>';
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    print "</pre>";*/

}

?>
</body>
</html>
