<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communications Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../Auth/login_success.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Chat/chat.php">Group Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../User/user_management.php">Manage User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Document/document_management.php">Manage Document</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li><a href="../Auth/logout.php" class="btn btn-dark"> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-2">
        <?php
        include ("../authentication.php");
        if (authenticateUser()) {
            echo "<h3>Welcome! " . $_SESSION["userName"] . "</h3>";
        }
        ?>
    </div>

</body>

</html>