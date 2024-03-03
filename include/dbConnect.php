<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "hrs";
$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>