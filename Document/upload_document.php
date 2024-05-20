<?php
require("file_upload.php");
require ("../data_access.php");

$fileLabel = $_POST["fileLabel"];

if (!$fileLabel) {
    echo "You have not entered all the required details.<br />"
        . "Please <a href='./upload_document.html' class='btn-link'>upload file</a> again.";
    exit;
}

if ($_FILES['fileUpload']['error'] > 0) {
    switch ($_FILES['fileUpload']['error']) {
        case 1:
            echo "File exceeded upload_max_file_size";
            break;

        case 2:
            echo "File exceeded upload max_file_size";
            break;

        case 3:
            echo "File only partially uploaded";
            break;

        case 4:
            echo "no file uploaded";
            break;
    }

    exit;
}


$document_path = $_SERVER['DOCUMENT_ROOT'];

$uploaded_file_path = $document_path . "/php/CommunicationsApplication/Uploads/" . $_FILES['fileUpload']['name'];

uploadFile($uploaded_file_path);

$query = "insert into document (FileLabel, FileName) values('" . $fileLabel . "', '" . $_FILES['fileUpload']['name'] . "')";

$result = $db->query($query);

if ($result) {
    header('Location: document_management.php');
    
} else {
    echo "Document upload unsuccessful.<br />"
        . "Please <a href='./Document/upload_document.html' class='btn-link'>upload file</a> again.";
}

$db->close();
?>