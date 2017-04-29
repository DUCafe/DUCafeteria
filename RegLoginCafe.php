<?php

/*$servername = "localhost";
$username = "root";
$password = "102938";
$dbname = "users";

//create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($db -> connect_error){
	die("connection failed ".$db->connect_error);
}

//success message
echo "connected successfully"."<br>";


//sql command to create a database named users
 $create_db = "CREATE DATABASE users";

//executing command through query function
/*if($db->query($create_db) == true)
{
	echo "DB created successfully";
}
else echo "Error creation ".$db->error."<br>"; */

//create table commmand
/*$create_table = "CREATE TABLE MYTABLE (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(11) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(11) NOT NULL
)"; */

//executing command of creating table
/*if($db->query($create_table) == true)
	echo "table created. ". "<br>";
else echo "error ".$db->error." <br>"; */

//Inserting value to table
/* $ins_data = "INSERT INTO MYTABLE (username, email, password)
	VALUES ('HAPPY', 'h@yahoo.com', '12345')";

if($db->query($ins_data) == true)
	echo "inserted. ". "<br>";
else echo "error ".$db->error." <br>"; */

/* $del_data = "DELETE FROM MYTABLE WHERE username = 'HAPPY'";

if($db->query($del_data) == true)
	echo "deleted. ". "<br>";
else echo "error ".$db->error." <br>";

echo $_POST['username']."<br>";
echo $_POST['email']."<br>";



$db->close();*/

?>

<!DOCTYPE html>
<html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8"/>
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">


    <script type="text/javascript">

        function isValid() {
            if (response == "Success")
                return true;
            return false;
        }
        function check1(id) {
            if (id === 0) {
                var adminid = document.getElementById("adminid").value;
                var name = document.getElementById("name").value;
                var address = document.getElementById("address").value;
                var phone = document.getElementById("phone").value;
                var email = document.getElementById("email").value;
                var pass1 = document.getElementById("password11").value;
                var pass2 = document.getElementById("password22").value;



                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {

                    console.log(this.readyState + " " + this.status + " " + xhttp.responseText);
                    if (this.readyState == 4 && this.status == 200) {

                        var response = xhttp.responseText;
                        document.getElementById("StatusLabel").style.display = "none";
                        document.getElementById("regStatus").value = response;
                        if (String(response.trim()) === "Success") {

                        }

                    }
                }


                xhttp.open("GET", "regCafeDB" +
                    ".php?adminid=" + adminid + "&adminname=" + name + "&address" + address+ "&phone" + phone +
                    "&email" +
                    email +
                "&password1=" + pass1 + "&password2=" + pass2, true);

                xhttp.send();


            }
            else if (id === 1) {
                var name = document.getElementById("ladminid").value;
                var pass = document.getElementById("lpassword").value;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {

                    if (this.readyState == 4 && this.status == 200) {

                        var response1 = xhttp.responseText;
                        document.getElementById("loginStatusLabel").style.display = "none";
                        document.getElementById("loginStatus").value = response1;
                        if (response1 == "Success") {

                            document.getElementById("formlogin").submit();
                        }
                    }
                    xhttp.open("GET", "loginCafeDB.php?username1=" + name + "&password1=" + pass, true);
                    xhttp.send();
                }
            }
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo')
                        .attr('src', e.target.result)
                        //.width(150)
                        //.height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

    <style>
        article, aside, figure, footer, header, hgroup,
        menu, nav, section { display: block; }
    </style>

</head>

<body>

<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Sign Up for Free</h1>

            <form id = "registrationForm" action="profile.php" method="GET" enctype='multipart/form-data'>



                <div class="field-wrap">
                    <label>
                        AdminID<span class="req">*</span>
                    </label>
                    <input id = "adminid" type="text" required autocomplete="off" />
                </div>


                <div class="field-wrap">
                    <label>
                        Name<span class="req">*</span>
                    </label>
                    <input id = "name" type="text" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Address<span class="req">*</span>
                    </label>
                    <input id = "address" type="text" required autocomplete="off"/>
                </div>


                <div class="field-wrap">
                    <label>
                        Contact No.<span class="req">*</span>
                    </label>
                    <input id = "phone" type="text" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Email<span class="req">*</span>
                    </label>
                    <input id = "email" type="text" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id = password11 type="password"required autocomplete="off"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Confirm Password<span class="req">*</span>
                    </label>
                    <input id = password22 type="password" required autocomplete="off"/>

                </div>

                <div class="field-wrap">


                <div class="field-wrap">
                    <label hidden>
                        Upload Photo
                    </label>
                    <!--<input id = "photo" type= "file" accept="image/*" required autocomplete="off"/>
                    <input type='file' name="userFile" id="userFile" />
                    <img id="photo" src="#" height="50%" width="100%" alt="your image"
                    />-->

                </div>


                <div class="field-wrap">
                    <label id="StatusLabel">Registration Status
                    </label>
                    <input id = "regStatus" type="text"/>
                </div>

                <input type = "button" id = "register" value="Get Started" class="button
                button-block" onclick="check1(0)"/>
                <p id="warning"></p>
                    </div>

            </form>

        </div>

        <div id="login">
            <h1>Welcome Back!</h1>
            <form id="formlogin" action="loginUserDB.php" method="GET">

                <div class="field-wrap">
                    <label>
                        AdminID<span class="req">*</span>
                    </label>
                    <input id = "ladminid" type="text" name="username" class="textInput" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id = "lpassword" type="password" name="password" class="textInput" required
                           autocomplete="off"/>
                </div>

                <!-- <p class="forgot"><a href="#">Forgot Password?</a></p> -->
                <div class="field-wrap">
                    <label id="loginStatusLabel">Login Status</label>
                    <input id="loginStatus" type="text"/>
                </div>
                <input type="button" id = "signin" onclick="check1(1)" value="Log In"  class="button button-block">
            </form>

        </div>

    </div><!-- tab-content -->

</div>  <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>


























