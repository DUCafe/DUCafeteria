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
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
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
        function check(id)
        {
           if(id === 0)
            {
                var name = document.getElementById("name1").value;
                var email = document.getElementById("email1").value;
                var pass1 = document.getElementById("password11").value;
                var pass2 = document.getElementById("password22").value;
                var register = document.getElementById("register").value;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function ()
                {

                    console.log(this.readyState + " " + this.status + " " + xhttp.responseText);
                    if (this.readyState == 4 && this.status == 200)
                    {

                        var response = xhttp.responseText;
                        document.getElementById("StatusLabel").style.display = "none";
                        document.getElementById("regStatus").value = response;
                        if(String(response.trim()) === "Success")
                        {
                            window.location.href = "firstpage.php";
                        }
                    }

                }
                xhttp.open("GET", "regUserDB" +
                    ".php?username1="+name+"&email1="+email+"&password1="+pass1+"&password2="+pass2,
                    true);

                xhttp.send();

            }
            else if(id === 1)
            {
                var name = document.getElementById("name2").value;
                var pass = document.getElementById("password2").value;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function ()
                {

                    if (this.readyState == 4 && this.status == 200)
                    {

                        var response1 = xhttp.responseText;
                        document.getElementById("loginStatusLabel").style.display = "none";
                        document.getElementById("loginStatus").value = response1;
                        if(String(response1.trim()) === "Success") {

                            window.location.href = "firstpage.php";
                            //document.getElementById("formlogin").submit();
                        }
                    }
                }
                xhttp.open("GET", "loginUserDB.php?username1="+name+"&password1="+pass, true);
                xhttp.send();
            }
        }
    </script>


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

            <form id = "registrationForm" action="profile.php" method="GET">

                    <div class="field-wrap">
                        <label>
                            Name<span class="req">*</span>
                        </label>
                        <input id = name1 type="text" required autocomplete="off" />
                    </div>


                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input id = email1 type="email"required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
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
                    <label id="StatusLabel">Registration Status
                    </label>
                    <input id = "regStatus" type="text"/>
                </div>



               <!-- <input type='file' name="profilepicture" id="userPic" /> -->


                <input type = "button" id = "register" value="Get Started" class="button
                button-block" onclick="check(0)"/>
                <p id="warning"></p>

            </form>

        </div>

        <div id="login">
            <h1>Welcome Back!</h1>
            <form id="formlogin" action="loginUserDB.php" method="GET">

                <div class="field-wrap">
                    <label>
                        Username<span class="req">*</span>
                    </label>
                    <input id = name2 type="text" name="username" class="textInput" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id = password2 type="password" name="password" class="textInput" required
                           autocomplete="off"/>
                </div>

               <!-- <p class="forgot"><a href="#">Forgot Password?</a></p> -->
                <div class="field-wrap">
                    <label id="loginStatusLabel">Login Status</label>
                    <input id="loginStatus" type="text"/>
                </div>
                <input type="button" id = "signin" onclick="check(1)" value="Log In"  class="button button-block">
            </form>

        </div>

    </div><!-- tab-content -->

</div>  <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>

























