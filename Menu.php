<?php require ('Database.php'); ?>
<?php

session_start();
$name;
if(!isset($_SESSION['login_user']))
{
    $name = 'nothing';
}
else
    $name = $_SESSION['login_user'];
include ('navbar.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <meta charset="utf-8"/>
    <title>Sign-Up/Login Form</title>

    <link rel="stylesheet" href="css/MenuItems.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function checksession() {
            var name = '<?php echo "$name"?>';
            if(name == 'nothing')
            {
                alert("Please login to continue...");
                window.location.href= 'RegLoginCafe.php?back=Menu.php';
                return false;
            }
            else
            {
                alert(name);
                return true;
            }
        }
        con = 0;
        function addToDB()
        {
            var table = document.getElementById('menutable');
            var tablerow = table.rows.length;
            var myArray = [];
            var a1, a2, a3, a4;

            for(var i=1; i<tablerow; i++)
            {
                var oCells = table.rows.item(i).cells;
                myArray.push([]);

                for(var j = 0; j < 2; j++){
                    /* get your cell info here */
                    if(oCells.item(j).innerHTML.length == 0) {
                        alert("Fill out all fields");
                        return true;
                    }
                    myArray[i-1].push(oCells.item(j).innerHTML);
                    //alert(myArray[i-1][j]);
                }
                for(var j=2; j<4; j++)
                {
                    myArray[i-1].push(oCells.item(j).firstChild.value) ;
                    //alert(myArray[i-1][j]);
                }
            }
            alert("OK");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                console.log(xhttp.responseText);
                if(this.status==200 && this.readyState==4)
                {
                    alert(xhttp.responseText);
                }
            }
            xhttp.open("GET","addToMenu.php?data="+JSON.stringify(myArray)+"&len="+document.getElementById
                ('menutable').rows.length, true);
            xhttp.send();
        }
        function addItem(tablename) {
            if(con >= 20)
                alert("Limit exceeded!");
            else {

                var table = document.getElementById(tablename);
                var row = table.insertRow();
                var cell = new Array();


                for(var i=0; i<2; i++)
                {
                    cell[i] = row.insertCell();
                }
                for(var i=2; i<4; i++)
                {
                    cell[i] = row.insertCell();
                    cell[i].setAttribute('contenteditable', 'false');
                }

                var timevar1 = document.createElement('INPUT');
                timevar1.setAttribute('type','time');
                timevar1.setAttribute('value', '09:00');
                cell[2].appendChild(timevar1);
                //cell[2].contenteditable = "false";

                var timevar2 = document.createElement('INPUT');
                timevar2.setAttribute('type','time');
                timevar2.setAttribute('value','18:00');
                cell[3].appendChild(timevar2);
                //cell[3].contenteditable = "false";
            }
        }
        function removeItem(tablename)
        {

            var table = document.getElementById(tablename);
            var tablerow = table.rows.length;
            if(tablerow == 3) {
                alert("Sorry, Only 1 Row exists!");
                return true;
            }
            else
            table.deleteRow(-1);
        }
    </script>




</head>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>-->

<body background="images/home-bg.jpg" class="bodyclass" onload="checksession()">


    <div id="Menu" class="bodyclass">
        <!--<center><h1 style="margin-top: 10%;">MENU</h1></center> -->

        </div id = "menuform" action="welcome.php" method="POST" enctype='multipart/form-data'>

        <center><table id="menutable" contenteditable="true" style="margin-top: 10%">
                <tr>
                    <th colspan="4" style="text-align: center; font-size: 2em">Menu</th>
                </tr>
            <tr contenteditable="false">
                <th>Item Name </th>
                <th>Price</th>
                <th>Available From</th>
                <th>Available To</th>
            </tr>
            <tr id="tr1">
                <td></td>
                <td></td>
                <td contenteditable="false"><input type="time" value="09:00"></td>
                <td contenteditable="false"><input type="time" value="18:00"></td>
            </tr>
            </table></center>

    <center><input type="button" class="buttonclass" id="additem" name="additem" value="Add Item" onclick="addItem
    ('menutable')"></center>

    <center><input type="button" class="buttonclass" id="removeitem" name="removeitem" value="Remove Item"
                   onclick="removeItem
    ('menutable')"></center>


    <center><input type="submit" class="buttonclass" value="submit" class="button-block" onclick="addToDB()"></center>

        </form>
    </div><!-- /form -->

</body>
</html>


























