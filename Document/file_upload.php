<?php

function uploadFile($uploaded_file_path)
{
    if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploaded_file_path)) { // ?
            echo "Problem: Could not move file to destination directory";
            exit;
        }
    } else {
        echo "Problem: Possible file upload attack. Filename:";
        echo $_FILES['fileUpload']['name'];
        exit;
    }
    echo "File uploaded successfully";
}

function displayUploadedImage($filename)
{
    echo "<p>You uploaded the following image</p>";
    echo '<img src="../Uploads/' . $filename . '"/>';
}