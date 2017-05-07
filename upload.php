<?php require ('Database.php'); ?>
<?php


//if (isset($_POST["register"]))
{

    $imagename = $_POST['imagename'];
    $imageid = $_POST['imageid'];
    $adminid = $_POST['adminid'];
    $canteenname = $_POST['canteenname'];

    print_r("$adminid");
    print_r("$canteenname");
    //echo "<br>$canteenname";
    //echo "<br>$imageid";
    //echo "<br>$imagename";



    //print "$imagename";
   // print "<br>$imageid";

    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['imagename']['name']);

    if (move_uploaded_file($_FILES['imagename']['tmp_name'], $uploadfile)) {
        $ins_data = "INSERT INTO canteen (adminid, canteenname, location)
		VALUES ('$adminid', '$canteenname', '$uploadfile')";

        $res = $db->query($ins_data);

        if($res == true)
        {
            //echo "$uploadfile";
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
