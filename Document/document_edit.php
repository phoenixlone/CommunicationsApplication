<?php
include ("../authentication.php");
authenticateUser();

require ("../data_access.php");

$id = $_REQUEST['id'];
$query = "SELECT * FROM document WHERE ID='$id'";
$result = $db->query($query);
$row = $result->fetch_assoc();

$fileLabel = $row['FileLabel'];

if (isset($_POST['update'])) {

    $newFileLabel = $_POST['newFileLabel'];

    $query = "UPDATE document SET FileLabel='$newFileLabel' WHERE ID = '$id'";

    $result = $db->query($query);

    if ($result) {
        header("Location: document_management.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communications Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h2 class="text-center">Update Document Information</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">File label</label>
            <input type="text" class="form-control" name="newFileLabel" value="<?php echo $fileLabel ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href="./document_management.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>

</html>