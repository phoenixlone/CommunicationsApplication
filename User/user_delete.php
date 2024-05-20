<?php
include ("../authentication.php");
authenticateUser();

require ("../data_access.php");

$id = $_REQUEST['id'];
$query = "UPDATE user SET IsDeleted=1 WHERE ID='$id'";

$db->query($query);
header("Location: user_management.php");

?>