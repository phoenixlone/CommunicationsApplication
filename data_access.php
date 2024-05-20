<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "communication";
$port = "3306";

@$db = new mysqli($host, $username, $password, $dbName, $port);

if ($db->connect_error) { // property
  echo "Error: Could not connect to database " . $db->connect_error;
  exit;
}

?>