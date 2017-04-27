<html>
<body>
<form method='post' enctype='multipart/form-data' action="">
    <fieldset>
        <input type="file" id="theFile" name="theFile">
        <input type="submit" value="submit" id = "submit" name="submit">
    </fieldset>

</form>

<?php
echo "init";
if (isset($_POST["submit"]))
{
	$uploaddir = '/var/www/images/';
	$uploadfile = $uploaddir . basename($_FILES['theFile']['name']);

	echo "<p>";

	if (move_uploaded_file($_FILES['theFile']['tmp_name'], $uploadfile)) {
	  echo "File is valid, and was successfully uploaded.\n";
	} else {
	   echo "Upload failed";
	}

	echo "</p>";
	echo '<pre>';
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	print "</pre>";
}
?>
</body>
</html>
