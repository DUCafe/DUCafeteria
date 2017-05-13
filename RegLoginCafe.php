<?php

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

        function check1(id)
        {
            if (id === 0)
            {
                var adminid = document.getElementById("adminid").value;
                var name = document.getElementById("name").value;
                var address = document.getElementById("address").value;
                var phone = document.getElementById("phone").value;
                var email = document.getElementById("email").value;
                var pass1 = document.getElementById("password11").value;
                var pass2 = document.getElementById("password22").value;
                var imagename = document.getElementById("imageid").value;
                var imageid = "imageid";

                if(adminid=='' || name=='' || address=='' ||phone=='' || email == '' || pass1=='' ||
                    pass2 == '' || imagename == '')
                {
                    alert("Please fill up all of the fields");
                    return false;
                }


                var xhttp = new XMLHttpRequest();
                var success = false;



                xhttp.onreadystatechange = function ()
                {

                    console.log(this.readyState + " " + this.status + " " + xhttp.responseText);
                    if (this.readyState == 4 && this.status == 200)
                    {

                        var response = xhttp.responseText;

                        console.log(response);
                        if (String(response.trim()) === "Success")
                        {
                            success = true;
                            console.log(success);
                            var formdata = $('#registrationForm').serializeArray();
                            //alert(formdata);
                            document.getElementById("registrationForm").submit();
                           // window.location.href = 'welcome.php';

                        }

                    }
                }



                xhttp.open("POST", "Mail" +
                    ".php?adminid=" + adminid + "&adminname=" + name + "&address=" + address+ "&phone=" + phone +
                    "&email=" +
                    email +
                "&password1=" + pass1 + "&password2=" + pass2, true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.send();


            }
            else if (id === 1)
            {
                //alert("are you ok?");
                var name = document.getElementById("ladminid").value;
                var pass = document.getElementById("lpassword").value;
                if(name==''||pass=='')
                {
                    alert("Please fill up all of the fields");
                    return false;
                }
                //alert(name);
                //alert(pass);

                var xhttp1 = new XMLHttpRequest();
                console.log(xhttp1.readyState + " "+xhttp1.status);
                xhttp1.onreadystatechange = function()
                {
                    console.log(xhttp1.readyState + " "+xhttp1.status);
                    if (this.readyState == 4 && this.status == 200) {

                        var response1 = xhttp1.responseText;

                        //alert(response1);
                        console.log(response1);
                        if (String(response1).trim() == "Success") {

                            //alert(response1);
                            var location = window.location.href;
                            //alert(location);

                            location = location.substring(location.lastIndexOf('=')+1);
                            //alert(location);
                            window.location.href = location;
                        }
                    }
                }
                xhttp1.open("GET", "loginCafeDB.php?username1=" + name + "&password1=" + pass + "&id=1", true);
                xhttp1.send();
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

    <fieldset class="tab-content">
        <div id="signup">
            <h1>Sign Up for Free</h1>

            <form id = "registrationForm" action="upload.php" method="POST" enctype='multipart/form-data'>


            <fieldset><legend style="color: #ffffff; padding:1em;"><h3>Admin Profile</h3></legend>
                <div class="field-wrap">
                    <label>
                        AdminID<span class="req">*</span>
                    </label>
                    <input id = "adminid" name="adminid" type="text" required autocomplete="off" />
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
            </fieldset>


                <fieldset><legend style="color: #ffffff; padding:1em;"><h3>Canteen Information</h3></legend>
                <div class="field-wrap">
                    <label>
                        Canteen Name<span class="req">*</span>
                    </label>
                    <input id = "canteenname" name="canteenname" type="text" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label hidden>
                        Upload Photo
                    </label>
                    <input type= "file" name = "imagename" id="imageid" accept="image/*" onchange="readURL(this)"
                           required
                           autocomplete="off"/>
                    <!--<input type='file' name="userFile" id="userFile" />-->
                    <img id="photo" src="photo_default.png" height="50%" width="100%" alt="your image"/>

                </div>
    </fieldset>
                <div class="field-wrap">
                <input type = "button" name="register" id = "register" value="Get Started" class="button
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
                    <input id = "ladminid" type="text" name="userid" class="textInput" required autocomplete="off"/>
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


























