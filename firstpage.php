<?php
    session_start();
    $name;
    if(!isset($_SESSION['login_user']))
    {
        $name = 'false';
    }
    else
        $name = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DU Canteens</title>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <meta charset="UTF-8">
    <script type="text/javascript">

        GetImageFromDB();

        function GetImageFromDB() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function ()
            {
                if(this.status == 200 && this.readyState == 4)
                {
                    var response = JSON.parse(xhttp.responseText);
                    //alert(response);

                    response.forEach(function (item) {

                        item = String(item).trim();
                        //alert(item);

                        var path = '"goto(\'' + item +'\')" ';
                        var location = "findMenu.php?location=" + item + "&id=" + "1";

                        //alert(path);
                        //alert(location);

                        var command ='<a href=' + location +'  data-lightbox-gallery="zenda-gallery"><img src="'+item
                            +'" ' +
                            ' alt="gallery img" ' +
                            'onclick=' + path + '></a>';
                       // alert(command);

                        var div = document.createElement('div');
                        div.innerHTML = command;
                        div.class = "col-md-4 col-sm-4 wow fadeInUp";
                        document.getElementById('pictures').appendChild(div);
                    });
                }
            }
            xhttp.open('GET', 'search.php?id=2', true);
            xhttp.send();
        }


        function goto(location)
        {
            ///alert(location);
            //location.reload(true);
            //alert(window.location.href);
            window.location.href = "findMenu.php?location="+location+"&id=" +'1';
            return true;
        }

        function mysearch()
        {

            var name = document.getElementById("search").value;
            //alert(name);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function ()
            {

                if (this.readyState == 4 && this.status == 200)
                {

                    var response1 = xhttp.responseText;
                    //document.getElementById("search").value = response1;
                    if(String(response1.trim()) === "Success") {

                        //alert(canteenname1);
                        document.getElementById('search').value = '';
                        window.location.href = "findMenu.php?canteenname="+name+"&id=2";
                        return;
                    }
                }
            }
            xhttp.open("GET", "searchQuery.php?canteenname1="+name, true);
            xhttp.setRequestHeader( "pragma", "no-cache" );
            xhttp.send();
        }

        function isAdmin() {
            var name = '<?php echo "$name"?>';
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
                }
            }
            xhttp.open('GET', 'loginCafeDB.php?username1='+name+"&password1="+"none"+"&id=2", true);
            xhttp.send();
        }

    </script>


    </meta>

    <!--

    http://www.tooplate.com/view/2076-zentro-->

    <link>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="css/style_firstpage.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
</head>
<body onload="isAdmin()">

<!-- preloader section -->
<section class="preloader">
    <div class="sk-spinner sk-spinner-pulse"></div>
</section>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">ENJOY GOOD FOOD AT DU CAMPUS</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="smoothScroll">HOME</a></li>
                <li><a href="showNames.php" class="smoothScroll">RESTAURANTS</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SignUp <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="about-us">
                        <li><a href="RegLoginUser.php?location=firstpage.php">Student</a></li>
                        <li><a href="RegLoginCafe.php?location=firstpage.php">Canteen Controller</a></li>

                    </ul>
                </li>
                <!-- <li><a href="#menu" class="smoothScroll">SPECIAL MENU</a></li> -->
                <li class="dropdown">
                    <a href="#login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Log In <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="about-us">
                        <li><a href="login_design.php?location=firstpage.php">Student</a></li>
                        <li><a href="RegLoginCafe.php?location=firstpage.php">Canteen Controller</a></li>

                    </ul>
                </li>


                <!--<li><a href="RegLoginUser.php" class="smoothScroll">Log In</a></li>-->
                <li><a href="logout.php" class="smoothSroll">Log Out</a></li>
                <li id="update"><a href="Menu.php" class="smoothScroll">Update Menu</a></li>

            </ul>

        </div>
        <!--<div class="box">
            <div class="container-4">
                <input type="search" id="search" placeholder="Search..." />
                <button class="icon"><i class="fa fa-search"></i></button>
            </div> -->
    </div>
    </div>
</section>


<!-- home section -->
<section id="home" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1>DU CAFETERIAS</h1>

                <!--<h2>CLEAN &amp; SIMPLE DESIGN</h2> -->
                <!--<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>-->
                <section class="webdesigntuts-workshop">
                    <form>
                        <!--<input type="search" placeholder="What Canteen are you looking for?"> -->
                        <!--<label for="tags"></label>
                        <input type="text" id="tags" list="json-datalist" placeholder="What Canteen are you looking for?">
                        <input type="button" id="button" value = "Search" onclick="search()"/> -->
                        <input type="text" id="search" list="json-datalist" placeholder="...">
                        <input type="button" id="button" value = "Search" onclick="mysearch()"/>
                       <datalist id="json-datalist"></datalist>


                        <!--<datalist id="languages">
                            <option value="Pusti Canteen">
                            <option value="Jahir Canteen">
                            <option value="Hakeem Chattar">
                            <option value="TSC Cafeteria">
                            <option value="Math Canteen">
                            <option value="Deen Office Canteen">
                        </datalist> -->
                        <!-- <button id="button" onclick="ajaxFunction()">Search</button>
                         <!--<input type='button' onclick='ajaxFunction()' value='Search'/>-->
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>




<!-- gallery section -->
<section id="gallery" class="parallax-section" onload="GetImageFromDB()">
    <div class="container" id="pictures">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Food Gallery</h1>
                <hr>
            </div>


            <!--<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
                <a href="findMenu.php?location='images/modhu.jpg'" data-lightbox-gallery="zenda-gallery"><img
                            src="images/modhu.jpg" alt="gallery img" onclick="goto('images/modhu.jpg')"></a>
                <div>
                    <h3>Modhur Canteen</h3>
                    <span>Seafood / Shrimp / Lemon</span>
                </div>
                <a href="findMenu.php?location='images/gallery-img2.jpg'" data-lightbox-gallery="zenda-gallery"><img
                            src="images/tsc.jpg" alt="gallery img" onclick="goto('images/gallery-img2.jpg')"></a>
                <div>
                    <h3>TSC Cafeteria</h3>
                    <span>Tomato / Rosemary / Lemon</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                <a href="findMenu.php?location='images/gallery-img3.jpg'" data-lightbox-gallery="zenda-gallery"><img
                            src="images/gallery-img3.jpg" alt="gallery img"  onclick="goto('images/gallery-img3.jpg')"></a>
                <div>
                    <h3>Lemon-Rosemary Bakery</h3>
                    <span>Bread / Rosemary / Orange</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
                <a href="findMenu.php?location='images/gallery-img4.jpg'" data-lightbox-gallery="zenda-gallery"><img
                            src="images/gallery-img4.jpg" alt="gallery img" onclick="goto('images/gallery-img4.jpg')"></a>
                <div>
                    <h3>Lemon-Rosemary Salad</h3>
                    <span>Chicken / Rosemary / Green</span>
                </div>
                <a href="findMenu.php?location='images/gallery-img5.jpg'" data-lightbox-gallery="zenda-gallery"><img
                        src="images/gallery-img5.jpg" alt="gallery img" onclick="goto('images/gallery-img5.jpg')"></a>
                <div>
                    <h3>Lemon-Rosemary Pizza</h3>
                    <span>Pasta / Rosemary / Green</span>
                </div>
            </div>-->
        </div>
    </div>
</section>


<!-- JAVASCRIPT JS FILES -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/datalist.js"></script>



</body>
</html>

