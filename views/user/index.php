<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../libs/css.php") ?>
    <link rel="stylesheet" href="../views/user/user.css">
    <title>Admin - User</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="nav-container fixed-top">
            <?php include("../layouts/header.php") ?>
        </div>

        <div class="body-container d-flex flex-row">
            <?php include("../layouts/sidebar.php") ?>

            <div class="user-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
                <div class="d-flex flex-row justify-content-between">
                    <a class="btn btn-danger mb-3 " href="../views/user.create/">
                        Create New User
                    </a>
                    <form action="../controllers/UserController.php?page=1" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ID" name="userid" required>
                            <button type="submit" class="btn btn-secondary" id="basic-addon2" name="action" value="search">
                                Search
                            </button>
                        </div>
                    </form>
                </div>

                <div class="view-table">
                    <table class="table table-hover table-striped table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phonenumber</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Role</th>
                                <th scope="col mx-2">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($arrUser as $user) {
                                echo '<tr>';
                                echo '<td scope="row">' . $user['id'] . '</td>';
                                echo '<td scope="row">' . $user['fullname'] . '</td>';
                                echo '<td scope="row">' . $user['username'] . '</td>';
                                echo '<td scope="row">' . $user['email'] . '</td>';
                                echo '<td scope="row">' . $user['phonenumber'] . '</td>';
                                echo '<td scope="row">' . $user['gender'] . '</td>';
                                echo '<td scope="row">' . $user['rolename'] . '</td>';
                                echo '<td><a class="btn btn-warning btn-sm" href="../controllers/UserController.php?action=editFormShow&id=' . $user['id'] . '">Edit</a></td>';
                                echo '<td><a class="btn btn-danger btn-sm" href="../controllers/UserController.php?action=delete&username=' . $user['username'] . '">Delete</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination d-flex flex-row ">
                            <li class="page-item disabled">
                                <?php if ($page_count > 0) {
                                    for ($i = 1; $i <= $page_count; $i++) {
                                        if ($i == $page) {
                                            echo '<li class="page-item disabled"><a class="page-link" tabindex="-1">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="../controllers/UserController.php?page=' . $i . '" tabindex="-1">' . $i . '</a></li>';
                                        }
                                    }
                                } ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>

</html>