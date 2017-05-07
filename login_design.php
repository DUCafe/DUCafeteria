
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
      <link rel="stylesheet" href="css/style_login.css">
    <script type="text/javascript">
    function isValid() {
    if (response == "Success")
        alert('success');
    return true;
    return false;
    }
    function check()
    {
    var name = document.getElementById("name2").value;
    var pass = document.getElementById("password2").value;
    var xhttp = new XMLHttpRequest();

    //alert(name);
    //alert(pass);
    xhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            var response1 = xhttp.responseText;

            if(String(response1.trim()) === "Success")
            {
                //alert(response1);
                //location.reload();
                window.location.link("firstpage.php");
                document.getElementById("login").submit();

            }
        }
    }
    xhttp.open('GET', 'loginUserDB.php?username1='+name+'&password1='+pass, true);
    xhttp.send();

    }
    </script>


</head>

<body>
  <div class="login-page">
  <div class="form">
    <form class="register-form" >
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>

    <form class="login-form" id="login" action="firstpage.php">

      <input type="text" id="name2" name="name2" placeholder="username"/>
      <input type="password" id="password2" name="password2" placeholder="password"/>

        <button id= "submit" onclick="check()">login</button>

      <p class="message">Not registered? <a href="RegLoginUser.php">Create an account</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login_index.js"></script>

</body>
</html>