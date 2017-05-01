
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript tutorial</title>


    <script type="text/javascript">


        function Autocomplete()
        {

            var name = document.getElementById("nameID").value;
            console.log(value);
            var xhttpobj = new XMLHttpRequest();

            //if (value > 0)
            {

                xhttpobj.onreadystatechange = function () { //this function will be called when state is changed

                    console.log(this.readyState + " " + this.status + " " + xhttpobj.responseText);
                    if (this.readyState == 4 && this.status == 200) { // 200 is for ok status of response
                        // readystate may have different values
                        // 4 is for : response is sent

                        var response = xhttpobj.responseText;

                    }

                    //console.log(response);
                    document.getElementById("warning_msg").innerHTML = response;

                }

                xhttpobj.open("GET", "checker.php?num=" + value, true);
                console.log(value);
                xhttpobj.send();
            }
        }

                                                        // we will not load full webpage.


    </script>
    </meta>
</head>
<input id = "nameET" type="text" onkeypress="Autocomplete()"/>
<p id = "warning_msg"></p>

</body>
</html>
