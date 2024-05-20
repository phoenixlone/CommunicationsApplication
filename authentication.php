<?php
session_start();

function authenticateUser()
{
    if (!$_SESSION['userName']) {
        $path = __DIR__ . '\Auth\welcome.php';
        $path=str_replace('C:\\xampp\htdocs\\','',$path);
        header('Location: /' . $path);
        echo $path;
        return false;
    } else {
        return true;
    }
}