<?php
include ("../authentication.php");
authenticateUser();
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
                    <a class="nav-link" href="../Chat/chat.php">Group Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../User/user_management.php">Manage User</a>
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
        <h3>Users</h3>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require ("../data_access.php");
                $query = "SELECT * FROM user WHERE IsDeleted!= 1 ORDER BY ID";
                $result = $db->query($query);
                $num_result = $result->num_rows;

                for ($i = 0; $i < $num_result; $i++) {
                    $row = $result->fetch_assoc();
                    $id = $row['ID'];
                    echo '<tr>
                    <th scope="row">' . $row['ID'] . '</th>
                    <td>' . $row['UserName'] . '</td>
                    <td>' . $row['Email'] . '</td>';
                    echo "<td>";
                    echo "<a class='btn btn-outline-secondary btn-sm' href ='user_edit.php?id=$id'>Edit</a> ";
                    if ($_SESSION['userID'] != $id) {
                        echo "<a class='btn btn-outline-danger btn-sm' href ='user_delete.php?id=$id'>Delete</a>";
                    }
                    echo "</td>";
                    '</tr>';
                }

                $db->close();
                ?>

            </tbody>
        </table>

    </div>

</body>

</html>