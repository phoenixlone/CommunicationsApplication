<?php
include ("../authentication.php");
authenticateUser();

require ("../data_access.php");

$id = $_REQUEST['id'];
$query = "SELECT * FROM user WHERE ID='$id'";
$result = $db->query($query);
$row = $result->fetch_assoc();

$fullName = $row['UserName'];
$emailAddress = $row['Email'];

if (isset($_POST['update'])) {

    $newFullName = $_POST['newFullName'];
    $newEmailAddress = $_POST['newEmailAddress'];

    $query = "UPDATE user SET UserName='$newFullName', Email='$emailAddress' WHERE ID = '$id'";

    $result = $db->query($query);

    if ($result) {
        header("Location: user_management.php");
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
    <h2 class="text-center">Update User Information</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="newFullName" value="<?php echo $fullName ?>">
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="newEmailAddress" value="<?php echo $emailAddress ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href="./user_management.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>

</html>