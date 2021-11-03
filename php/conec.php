<?php
$link = new mysqli("localhost", "root", "rootroot");

mysqli_select_db($link, "proyecto");

if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
else {
	echo "POV: acabás de conectar la base de datos";
}

?>