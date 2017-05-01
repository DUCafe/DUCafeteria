<?php require ('Database.php'); ?>

<?php
$val = "default1";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   /* function upload()
    {
        $value = '';
        $imageid = $_POST['imageid'];
        $imagename = $_POST['imagename'];

        $uploaddir = '/var/www/images/';
        $uploadfile = $uploaddir . basename($_FILES[$imageid][$imagename]);

        if (move_uploaded_file($_FILES[$imagename]['tmp_name'], $uploadfile)) {
            $value = "Success";

        } else {
            $value = "Failed";
        }
        return $value;
    } */

    $val = 'default2';

    $adminid = $_GET['adminid'];
    $adminname = $_GET['adminname'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $password1 = $_GET['password1'];
    $password2 = $_GET['password2'];

    //echo "// "."$adminid";

    $retrieve_query = "SELECT * FROM admin where adminid = '$adminid' AND password='$password1'";
    $count = $db->query($retrieve_query);
    $count = $count->num_rows;


    if ($count == 0 && $password1 === $password2) {
        $password1 = md5($password1);
        //echo "$password1"." pass"."<br>";
        //$len = strlen($password1);
        //echo "$len"."<br>";
        //echo "$adminid<br>"."$adminname<br>"."$address<br>"."$phone<br>"."$email<br>"."$password1<br>";

        $ins_data = "INSERT INTO admin (adminid, adminname, address, phone,  password, email)
		VALUES ('$adminid', '$adminname', '$address', '$phone', '$password1', '$email')";

        $res = $db->query($ins_data);


        if ($res == true) {
            $val = "Success";
            // $val = upload();
        }
    } else
        $val = "Failed";
    echo "$val";
}


?>




