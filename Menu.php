<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->



    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <meta charset="utf-8"/>
    <title>Sign-Up/Login Form</title>

    <link rel="stylesheet" href="css/MenuStyle.css">

    <script>
        con = 0;
        function addItem(divname) {
            if(con >= 10)
                alert("Limit exceeded!");
            else {

                var newdiv = document.createElement('div');
                var str1 = '<table><tr><th>Item Name</th><td><input id = "name" ' + (con+1) + ' type="text"' +
                    '></td></tr>';

                var str2 = '<tr><th>Price</th><td><input type="text" id="price" ' + (con+1) +'></td></tr>';

                var str3 = '<tr><th>Available From </th><td><input type="time" id="start" '+ (con+1) +
                    ' value="09:00" ></td><th>&nbsp; To &nbsp;</th><td><input type="time" id="end"' + (con+1)
                    +' value="18:00" ></td></tr></table>';

                newdiv.innerHTML = str1 + str2 + str3;
                document.getElementById(divname).appendChild(newdiv);
            }
        }
    </script>




</head>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>-->

<body>

<div class="form">

    <div id="Menu">
        <h1>Menu Information</h1>

        </div id = "menuform" action="welcome.php" method="POST" enctype='multipart/form-data'>

    <div id="tablemenu">

        <table>
            <tr>
                <th>Item Name </th>
                <td><input id = "name" type="text"></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input type="text" id="price"></td>
            </tr>

            <tr>
                <th>Available From </th><td><input type="time" id="start" value="09:00"></td>
                <th>&nbsp;To&nbsp;</th><td><input type="time" id="end" value="18:00"></td>
            </tr>

        </table>
    </div>
    <input type="button" id="add" class="button-block" value="Add more..." onclick="addItem
            ('tablemenu')">

        <!--<div class="column"><input id = "name" type="text" placeholder="Item"></div>
        <div class="column"><input type="time" style="font-size: 19px"  id="start"></div> -
        <div class="column"><input type="time" style="font-size: 19px"  id="end"></div>
        <div class="column"><input type="text" id="price" placeholder="Price"></div>
        <div class="column"><button id="add" onclick="addItem('addItem')"><img src="add.png" height="19px"
                                                                               width="19px"></></div>

               <!-- <datalist id="time">
                    <option value="12:00"></option>
                    <option value="01:00"></option>
                    <option value="02:00"></option>
                    <option value="03:00"></option>
                    <option value="04:00"></option>
                    <option value="05:00"></option>
                    <option value="06:00"></option>
                    <option value="07:00"></option>
                    <option value="08:00"></option>
                    <option value="09:00"></option>
                    <option value="10:00"></option>
                    <option value="11:00"></option>
                </datalist>
            <datalist id="when">
                <option value="AM"></option>
                <option value="PM"></option>
            </datalist>

            <div class="column"><input type="text" class="date start" list="time"/></div>
            <div class="column"><input type="text" class="time start" list="when"/></div>
            <div class="column"><input type="text" class="time end" list="time"/></div>
            <div class="column"><input type="text" class="date end" list="when"/></div> -->



            <input type="submit" value="submit" class="button-block">

        </form>
    </div>
</div>  <!-- /form -->

</body>
</html>


























