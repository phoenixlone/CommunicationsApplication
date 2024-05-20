<?php
include ("../authentication.php");
authenticateUser();

require ("../data_access.php");

$id = $_REQUEST['id'];
$query = "UPDATE document SET IsDeleted=1 WHERE ID='$id'";

$db->query($query);
header("Location: document_management.php");

?>