<?php

require ("../data_access.php");

$fullName = $_POST["fullName"];
$emailAddress = $_POST["emailAddress"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

if (!$fullName || !$emailAddress || !$password || !$confirmPassword) {
    echo "You have not entered all the required details.<br />"
        . "Please <a href='./register.php' class='btn-link'>register</a> again.";
    exit;
} else if ($password != $confirmPassword) {
    echo "Password and confirm password must be same.<br />"
        . "Please <a href='./register.php' class='btn-link'>register</a> again.";
    exit;
}

$query = "INSERT INTO user (UserName,Email,Password) VALUES('" . $fullName . "', '" . $emailAddress . "', '" . $password . "')";

$result = $db->query($query);

if ($result) {
    header('Location: register_success.php');
} else {
    echo "Registration unsuccessful.<br />"
        . "Please <a href='./register.php' class='btn-link'>register</a> again.";
}

$db->close();
?>