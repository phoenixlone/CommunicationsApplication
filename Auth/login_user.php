<?php
session_start();
require ("../data_access.php");

$emailAddress = $_POST["emailAddress"];
$password = $_POST["password"];

if (!$emailAddress || !$password) {
    echo "You have not entered all the required details.<br />"
        . "Please <a href='./login.php' class='btn-link'>login</a> again.";
    exit;
}

$query = "SELECT * FROM user WHERE Email = '" . $emailAddress . "' and Password = '" . $password . "';";

$result = $db->query($query);
$row = $result->fetch_assoc();
$userID = $row['ID'];

$num_results = $result->num_rows;

if ($num_results > 0) {
    $_SESSION["userID"] = $userID;
    $_SESSION["userName"] = $emailAddress;
    header('Location: login_success.php');
} else {
    echo "Please enter correct credencials.<br />"
        . "Please <a href='./login.php' class='btn-link'>login</a> again.";
}

$db->close();
?>