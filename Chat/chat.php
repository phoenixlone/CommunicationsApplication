<?php
include ("../authentication.php");
authenticateUser();

require ("../data_access.php");

if (isset($_POST["message"])) {
    $message = $_POST["message"];
    if ($message) {
        $query = "INSERT INTO chat (Message,UserID) VALUES('" . $message . "', " . $_SESSION['userID'] . ")";

        $result = $db->query($query);

        if ($result) {
            header('Location: chat.php');
        }
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

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Auth/login_success.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../Chat/chat.php">Group Chat</a>
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
        <h3>Group Chat</h3>
        <div class="row">
            <div class="col-12">

                <ul class="list-unstyled">

                    <?php
                    require ("../data_access.php");
                    $query = "SELECT c.ID, c.Message, c.MessagedOn, c.UserID, u.UserName, u.Email FROM chat c inner join user u on c.UserID = u.ID WHERE u.IsDeleted != 1 ORDER BY c.MessagedOn ASC";
                    $result = $db->query($query);
                    $num_result = $result->num_rows;

                    for ($i = 0; $i < $num_result; $i++) {
                        $row = $result->fetch_assoc();
                        $id = $row['ID'];
                        $userId = $row['UserID'];
                        if ($_SESSION['userID'] != $userId) {
                            echo '<li class="d-flex justify-content-between mb-4 w-75 float-start">';
                        } else {
                            echo '<li class="d-flex justify-content-between mb-4 w-75 float-end">';
                        }

                        echo '<div class="card">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">' . $row['UserName'] . '</p>
                                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> ' . $row['MessagedOn'] . '</p>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">
                                    ' . $row['Message'] . '
                                    </p>
                                </div>
                            </div>';

                        echo '</li>';
                    }

                    $db->close();
                    ?>

                </ul>

                <div class="d-flex justify-content-between mb-4 w-100 float-start bg-white">
                        <form method="POST" class="row w-100">
                            <div class="form-outline col-10">
                                <textarea class="form-control" rows="2" placeholder="Message" spellcheck="true"
                                    name="message"></textarea>
                            </div>
                            <div class="col-2 px-4">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </d>

            </div>
        </div>

    </div>

</body>

</html>