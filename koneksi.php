<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "pweb-pr";

$con = mysqli_connect($serverName, $userName, $password, $dbname);

if ($con) {
echo "Connected successfully";
} else {
echo "Connection failed";
exit();
}

?>