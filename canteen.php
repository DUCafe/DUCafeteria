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

        var con = 0;
        function addItem(divname) {
            if(con >= 10)
                alert("Limit exceeded!");
            else {
                var newdiv = document.createElement('div');
                con++;
                newdiv.innerHTML = "<br><label> Item "+ (con+1) +"<span class='req'>*</span></label>"+"<input id " +
                    "= " +
                    "item"+con+" type='text'  name='item' required " +
                    "autocomplete='off'/>";
                document.getElementById(divname).appendChild(newdiv);
            }
        }

        function check()
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


                var xhttp = new XMLHttpRequest();
                var success = false;


                xhttp.onreadystatechange = function ()
                {

                    console.log(this.readyState + " " + this.status + " " + xhttp.responseText);
                    if (this.readyState == 4 && this.status == 200)
                    {

                        var response = xhttp.responseText;
                        document.getElementById("StatusLabel").style.display = "none";
                        document.getElementById("regStatus").value = response;
                        console.log(response);
                        if (String(response.trim()) === "Success")
                        {
                            success = true;
                            console.log(success);
                            var formdata = $('#registrationForm').serializeArray();
                            alert(formdata);
                            document.getElementById("registrationForm").submit();
                            // window.location.href = 'welcome.php';

                        }

                    }
                }



                xhttp.open("POST", "regCafeDB" +
                    ".php?adminid=" + adminid + "&adminname=" + name + "&address=" + address+ "&phone=" + phone +
                    "&email=" +
                    email +
                    "&password1=" + pass1 + "&password2=" + pass2, true);

                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.send();
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
        .column
        {
            float: left;
            width: 33%;
            margin: auto;
        }
    </style>

</head>

<body>

<div class="form">


        <div id="canteen">
            <h1>Canteen Information</h1>

            <form id = "canteenform" action="upload.php" method="POST" enctype='multipart/form-data'>

                <div class="field-wrap">
                    <label>
                        Canteen Name<span class="req">*</span>
                    </label>
                    <input id = "name" type="text" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Address<span class="req">*</span>
                    </label>
                    <input id = "address" type="text" name="item" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label hidden>
                        Upload Photo
                    </label>
                    <input type= "file" name = "imagename" id="imageid" accept="image/*" onchange="readURL(this)"
                           required
                           autocomplete="off"/>
                    <!--<input type='file' name="userFile" id="userFile" />-->
                    <img id="photo" src="photo_default.png" height="50%" width="100%" alt="your image"
                    />

                </div>

                <!-- ***** Menu Items dynamic START ***** -->


               <!-- <div id="add">
                    <div class="column">
                        <div class="field-wrap">
                            <label>
                                Item Name<span class="req">*</span>
                            </label>
                            <input id = "item1" type="text" name="item" required autocomplete="off"/>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field-wrap">
                            <label>
                                Available Time<span class="req">*</span>
                            </label>
                            <input id = "item2" type="text" name="item" required autocomplete="off"/>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field-wrap">
                            <label>
                                Ingredients<span class="req">*</span>
                            </label>
                            <input id = "item3" type="text" name="item" required autocomplete="off"/>
                        </div>
                    </div>

                </div>

                <div class="field-wrap">
                    <input type="button" id = "menu" value="Add Item"  class="button
                           button-block" onclick="addItem('add')"  />
                </div> -->


                <!-- ***** Menu Items dynamic END ***** -->



                <input type = "button" id = "register" value="Submit" class="button
                button-block" onclick="check()"/>
                    <p id="warning"></p>


            </form>



</div>  <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>


























