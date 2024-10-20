<?php

$dbSeverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "gamecraft";

$conn = new mysqli($dbSeverName, $dbUserName, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
