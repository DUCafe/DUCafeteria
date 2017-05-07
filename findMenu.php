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
else
{
    $canteenname = $_GET['canteenname'];
    $retrieve_query = "SELECT canteenid FROM canteen where canteenname = '$canteenname'" ;
}


/*if(isset($_GLOBALS['location']))
    unset($_GLOBALS['location']);
if(isset($_GLOBALS['canteenname']))
    unset($_GLOBALS['canteenname']);
unset($_GLOBALS['retrieve_query']);*/

$result = $db->query($retrieve_query);

$cid = $result->fetch_assoc();
$cid = $cid['canteenid'];


if($id == 2)
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
    //echo $r['menuname'];
   //echo $r['price'];
    //echo $r['review'];
}

$i = 0;
while( $r = $comments->fetch_assoc()) {
    $comment[$i][0] = $r['username'];
    $comment[$i][1] = $r['review'];
    $comment[$i][2] = $r['menuname'];
    $i++;
    //echo $r['menuname'];
    //echo $r['price'];
    //echo $r['review'];
}

include ('navbar.php');

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="stylesheet" href="css/MenuItems.css">
    <meta charset="utf-8">
    <script type="text/javascript">
        var comment_num;
        name = '<?php echo ($name)?>';
        cid = '<?php echo ($cid) ?>';
        function setComment()
        {
            var review;
            var xhttp = new XMLHttpRequest();
            review = document.getElementById('mycomment').value;
            console.log(review);

            if(review.length > 0 ) {
                console.log("full");

                xhttp.onreadystatechange = function()
                {

                    if (xhttp.readyState == XMLHttpRequest.DONE)
                    {
                        //var name = '<?php echo ($name)?>';
                        var response = xhttp.responseText;
                        comment_num++;
                        if(String(response).trim() == 'success')
                        {
                            //document.getelementbyid('comments').readOnly = false;

                            var oldcomment = document.createElement("input");

                            var label = document.createElement('LEGEND');
                            label.innerHTML = "<br>"+name.toUpperCase()+" :   ";
                            label.setAttribute('style', "display:block");
                            //label.setAttribute('class','textbox');


                            //alert(name);

                            oldcomment.setAttribute('type', 'text');
                            oldcomment.setAttribute('class', 'textbox');
                            oldcomment.setAttribute('value', review);
                            //new XMLSerializer().serializeToString(oldcomment);

                            document.getElementById('comments').appendChild(oldcomment);
                            document.getElementById('comments').insertBefore(label, oldcomment);
                            document.getElementById('mycomment').value = '';

                            //var breakline = document.createElement("br");
                            //document.getElementById('comments').appendChild(breakline);

                            document.getElementById('comments').readOnly = false;
                        }
                    }
                }
                //alert(cid + " "+review);
            xhttp.open('GET', 'addComment.php?cid=' + cid + '&review=' + review + '&menuname=' + 'dummy',
                true);
            xhttp.send();
            }
        }

        function  gotoLogIn() {
            window.location.href = "RegLoginUser.php";
        }

        function getData() {

            var food_data = <?php echo json_encode($food_desc)?>;
            var comment_data = <?php echo json_encode($comment)?>;

            var len = food_data.length;
            comment_num = comment_data.length;

            //alert(comment_num);


            var location = '<?php echo ($location) ?>';
            //alert(location);
            location = String(location).trim();
            document.getElementById('canteenpic').src = location;

            if(name == 'nothing')
            {
                document.getElementById('comments').style.display='none';
                document.getElementById('mycomment').style.display='none';
                document.getElementById('SubmitComment').style.display='none';
                //document.getElementById('container').style.display='none';
            }
            else
            {
                document.getElementById("LogInRedirection").style.display='none';
            }


           // alert(len);
            //alert(comment_num);

            if(len == 1)
            {
                document.getElementById('foodtable').style.display='none';
                document.getElementById('lid').innerHTML = "Item Description : N/A";
            }

            for(var i=0; i<len; i++)
            {
                var table = document.getElementById("foodtable");
                var row = table.insertRow();
                var cell = new Array();

                for(var j=0; j<4; j++){
                    cell[i] = row.insertCell();
                    cell[i].innerHTML = food_data[i][j];
                }
            }

            for(var i=0; i<comment_num; i++)
            {

                var oldcomment = document.createElement("input");

                var label = document.createElement('LEGEND');
                label.innerHTML = "<br>"+comment_data[i][0]+" :   ";
                label.setAttribute('style', "display:block");
                //label.setAttribute('class','textbox');

                oldcomment.setAttribute('type', 'text');
                oldcomment.setAttribute('class', 'textbox');
                oldcomment.setAttribute('value', comment_data[i][1]);

                //var breakline = document.createElement("br");
                //document.getElementById('comments').appendChild(breakline);


                document.getElementById('comments').appendChild(oldcomment);
                document.getElementById('comments').insertBefore(label, oldcomment);
                //document.getElementById('comments').readOnly = true;

                /*var str = comment_data[i][0]+ ": ";
                str += comment_data[i][1];
                var node = document.createTextNode(str);
                newpara.appendChild(node);

                document.getElementById('comments').appendChild(newpara);*/

            }
            document.getElementById('comments').style.pointerEvents = 'none';
        }

    </script>
</head>
<body onload="getData()">

    <center><img id="canteenpic" alt="Canteen Photo" height="5%" width="40%" align="absmiddle"></center>
    <div class="field-css">
        <fieldset><strong><legend id="lid">Item Description</legend></strong>


            <table id="foodtable">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Available From</th>
                    <th>Available To</th>
                </tr>
            </table>
        </div>
        <!--<fieldset><p id="name"></p></fieldset>
        <fieldset><p id="price"></p></fieldset> -->



                <div id="comments" style="pointer-events:none">

                </div>

                <div id="mycommmentdiv">
                <textarea id="mycomment" rows="5" cols="160" placeholder="Write a comment..."
                          style="border: groove"></textarea><br>
                    <input type="button" id="SubmitComment" value="Enter" style="float: right; height:50px;width:200px"
                           onclick="setComment()">
                </div>
            </fieldset>
        <center><input type="button" class="buttonclass" id="LogInRedirection" value="Log in to see reviews"
               onclick="gotoLogIn()"></center>


    </div>

</body>
</html>

