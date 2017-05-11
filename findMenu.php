<?php
session_start();
$name;
if(!isset($_SESSION['login_user']))
{
    $name = 'nothing';
}
else
    $name = $_SESSION['login_user'];

include ('Database.php');

global $retrieve_query;
global $location;
global $canteenname;

$id = $_GET['id'];

if($id == 1)
{
    $location = $_GET['location'];
    $retrieve_query = "SELECT canteenid FROM canteen where location = '$location'" ;

}
if($id == 2)
{
    $canteenname = $_GET['canteenname'];
    $retrieve_query = "SELECT canteenid FROM canteen where canteenname = '$canteenname'" ;
}

$result = $db->query($retrieve_query);

$cid = $result->fetch_assoc();
$cid = $cid['canteenid'];

if($id==2)
{
    $retrieve_location = "SELECT location FROM canteen where canteenid = '$cid'" ;
    $location = $db->query($retrieve_location);
    $location = $location->fetch_assoc();
    $location = $location['location'];
}



$retrieve_query = "SELECT * FROM menu where canteenid = '$cid'" ;
$result = $db->query($retrieve_query);


$retrieve_comment = "SELECT * FROM comment where canteenid = '$cid'";
$comments = $db->query($retrieve_comment);

$food_desc = array(array());
$comment = array(array());
$i = 0;
$j = 0;

while( $r = $result->fetch_assoc()) {
    $food_desc[$i][0] = $r['menuname'];
    $food_desc[$i][1] = $r['price'];
    $food_desc[$i][2] = $r['availableFrom'];
    $food_desc[$i][3] = $r['availableTo'];
    $i++;
}

$i = 0;
while( $r = $comments->fetch_assoc()) {
    $comment[$i][0] = $r['username'];
    $comment[$i][1] = $r['review'];
    $comment[$i][2] = $r['menuname'];
    $i++;
}

include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/animate.min.css">
    <!--<link rel="stylesheet" href="css/CafeDetails.css">-->

    <meta charset="utf-8">

    <style>
        .detailBox {
            width:100%;
            border:1px solid #bbb;
        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox {
            padding:10px;
            border-top:1px dotted #bbb;
        }
        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }
        .actionBox .form-group * {
            width:100%;
        }
       /* .taskDescription {
            margin-top:10px;
        } */
        .commentList {
            padding:0;
            list-style:none;
            max-height:300px;
            overflow:auto;
        }
        .commentList li{
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p{
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
    </style>



    <script type="text/javascript">
        $(document).ready(function () {

            var location = '<?php echo "$location"?>';
            var cid = '<?php echo "$cid"?>';

            $('#canteenpic').attr('src', location);

            var food_data = <?php echo json_encode($food_desc)?>;
            var comment_data = <?php echo json_encode($comment)?>;
            var name = '<?php echo ($name)?>';

            if(name !== 'nothing')
            {
                $('#loginagain').hide();
            }

            var len = food_data.length;
            var comment_num = comment_data.length;

            if(len === 1)
            {
                $('#foodtable').hide();
            }
            if(comment_num === 1 || name === 'nothing')
            {
                $('#detailbox').hide();
            }


            var imgsrc, dateval;
            var reviewval;
            var id = 'profile.php';

            if(len > 1) {
                for (var i = 0; i < len; i++) {
                    $('#foodtable').append('<tr id="food' + i + '" class="jump-response"></tr>');
                    $('#food' + i).html("<td>" + food_data[i][0] + "</td>" + "<td>" + food_data[i][1] + "</td>" + "<td>" +
                        food_data[i][2] + "</td>" + "<td>" + food_data[i][3] + "</td>");
                }
            }

            for(var i=0; i<comment_num; i++)
            {
                 imgsrc = 'http://placekitten.com/45/45';
                 dateval = 'March 5th, 2014';


                $('#commentsection').append('<li id="comment' + i +'"></li>');

                $('#comment' + i).append('<div id="commentdiv' + i + '" class="commentText"></div>');
                $('#commentdiv' + i).html( '<a href="profile.php" class="btn btn-primary ' +
                    'btn-block" role="button">' + comment_data[i][0] + '</a>');

                $('#comment' + i).append('<div id="commentdiv' + i + i + '" class="commentText"></div>');
                $('#commentdiv' + i + i).html('<p id="commentPara' + i + '">' +'&nbsp;' +comment_data[i][1] + '</p>');

                $('#commentPara' + i).append('<br><span class="date sub-text">' + dateval + '</span>');

                $("a[href='profile.php']").attr('href', 'profile.php?id='+comment_data[i][0]);
            }

            $('#reviewbutton').click(function (e)
            {
                e.preventDefault();

                if((reviewval = $('#review').val()).length > 0)
                {
                    $('#review').val('');

                    $('#commentsection').append('<li id="comment' + comment_num + '"></li>');

                    $('#comment' + comment_num).append('<div id="commentdiv' + comment_num + '" class="commenterImage"></div>');
                    $('#commentdiv' + comment_num).html('<a href="profile.php" class="btn btn-default btn-xs"' +
                        ' role="button">' + name + '</a>');

                    $('#comment' + comment_num).append('<div id="commentdiv' + comment_num + comment_num + '" class="commentText"></div>');
                    $('#commentdiv' + comment_num + comment_num).html('<p id="commentPara' + comment_num +
                        '">' + '&nbsp;' + reviewval + '</p>');

                    $('#commentPara' + comment_num).append('<br><span class="date sub-text">' + dateval + '</span>');

                    $("a[href='profile.php']").attr('href', 'profile.php?id='+name);

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {

                        if (xhttp.readyState == XMLHttpRequest.DONE) {
                            var response = xhttp.responseText;
                            if (String(response).trim() == 'success') {

                            }
                        }
                    }
                    xhttp.open('GET', 'addComment.php?cid=' + cid + '&review=' + reviewval + '&menuname=' + 'dummy',
                        true);
                    xhttp.send();

                }
            });

            $("a[href='RegLoginUser.php']").attr('href', 'RegLoginUser.php?id=1&location='+"<?php echo
                "$location"?>");

            $(".jump-response").each(function() {
                var hue = 'rgb(' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ')';
                $(this).css("background-color", hue);
            });
        });

    </script>
</head>

<body>

<section id="canteen">
    <div class="jumbotron" id="pictures">

        <div class="container">
            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                <div class="thumbnail">
                    <img id="canteenpic" alt="Canteen Photo" width="460" height="345">
                </div>
            </div>

            <table class="table table-bordered" id="foodtable">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Available From</th>
                        <th>Available To</th>
                    </tr>
                </thead>
                <tbody id="foodtablebody">
                    <tr id="food1" class="jump-response"></tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="detailBox" id="detailbox">
                <div class="titleBox">
                    <label>Comment Section</label>
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                </div>

                <div class="actionBox" id="actionbox">
                    <ul class="commentList" id="commentsection">
                        <li>
                            <div class="commenterImage">
                                <img src="http://placekitten.com/45/45" />
                            </div>
                            <div class="commentText">
                                <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                            </div>
                        </li>
                    </ul>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <input id = "review" class="form-control" type="text" placeholder="Write a comment..." />
                        </div>
                        <div class="form-group">
                            <button id="reviewbutton" class="btn btn-group-justified">Enter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <a href="RegLoginUser.php" id="loginagain" class="btn btn-primary btn-block"
                   role="button">Log
                    in to
                    see reviews</a>
            </div>
            <div class="jumbotron">
                <div class="container">
                    <a href="firstpage.php" class="btn btn-primary btn-block" role="button">Back to home page</a>
                </div></div>
        </div>
    </div>
</section>

</body>
</html>


