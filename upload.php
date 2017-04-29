<?php
echo "init";
if (isset($_POST["submit"]))
{

    echo "post method";
    // grab  the url
    $url = $_POST['theFile'];

    print $url."<br/>";

    // return ifo about the url
    $path_parts = pathinfo($url);

    echo $path_parts['dirname'], "/" ."<br>";
    echo $path_parts['basename'], "/" ."<br>";

    // save the file name in variable
    $image = ($path_parts['basename']);

    echo $path_parts['extension'], "/";

    // copy the file to you folder
    copy($url,"images/" .$image);

}

?>