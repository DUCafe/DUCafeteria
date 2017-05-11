<?php
session_start();
$name;
if(!isset($_SESSION['login_user']))
{
    $name = 'nothing';
}
else
    $name = $_SESSION['login_user'];
?>
<!Doctype html>
<head>

    <script type="text/javascript">
        function isAdmin() {
            var name = '<?php echo "$name"?>';
            var flag = 0;

            if(name === 'nothing')
            {
                document.getElementById('logout').style.display='none';
            }
            else flag = 1;


            //alert(name);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.status == 200 && this.readyState == 4){
                    var response = xhttp.responseText;
                    if(String(response).trim() == 'Failure')
                    {
                        //alert(response);
                        document.getElementById('update').style.display = 'none';
                    }
                    else if(flag === 0){
                        document.getElementById('logout').style.display='block';
                    }
                }
            }
            xhttp.open('GET', 'loginCafeDB.php?username1='+name+"&password1="+"none"+"&id=2", true);
            xhttp.send();
        }
    </script>
</head>
    <body onload="isAdmin()">
        <!-- navigation section -->
        <section>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Enjoy Good Food at DU Campus</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll">HOME</a></li>
                    <li><a href="showNames.php" class="smoothScroll">Canteens</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SignUp <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="RegLoginUser.php?location=firstpage.php">Student</a></li>
                            <li><a href="RegLoginCafe.php?location=firstpage.php">Canteen Controller</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Log In <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="login_design.php?location=firstpage.php">Student</a></li>
                            <li><a href="RegLoginCafe.php?location=firstpage.php">Canteen Controller</a></li>

                        </ul>
                    </li>

                    <li id="logout"><a href="logout.php" class="smoothSroll">Log Out</a></li>
                    <li id="update"><a href="Menu.php" class="smoothScroll">Update Menu</a></li>
                </ul>
            </div>
        </nav>
    </section>

    </body>
</html>



