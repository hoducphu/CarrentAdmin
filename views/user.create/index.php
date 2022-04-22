<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../libs/layoutCSS.php") ?>
    <link rel="stylesheet" href="./usercreate.css">
    <title>Admin - User - Create</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="nav-container fixed-top">
            <?php include_once("../../layouts/layoutHeader.php") ?>
        </div>

        <div class="body-container d-flex flex-row">
            <?php include_once("../../layouts/sidebar.php") ?>

            <div class="user-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../controllers/UserController.php">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="create-form">
                    <form action="../../controllers/UserController.php" id="create_user" method="POST" class="row g-3 border rounded" enctype="multipart/form-data">
                        <div class="form-header col-md-12 mt-2">User Create Form</div>
                        <div class="col-md-6 my-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="col-md-6 my-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Phone Number (Ex: 0123456789)" name="phonenumber">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control" placeholder="Example@gmail.com" name="email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Address" name="address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-check">Gender</label>
                            <div class="form-check" id="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                <label class="form-check-label" for="gender1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check" id="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label" for="gender2">
                                    Female
                                </label>
                            </div>
                            <div class="form-check" id="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="other">
                                <label class="form-check-label" for="gender3">
                                    Other
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-check">Role</label>
                            <div class="form-check" id="form-check">
                                <input class="form-check-input" type="radio" name="role" value="staff" checked>
                                <label class="form-check-label" for="role2">
                                    Staff
                                </label>
                            </div>
                            <div class="form-check" id="form-check">
                                <input class="form-check-input" type="radio" name="role" value="admin">
                                <label class="form-check-label" for="role1">
                                    Admin
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control form-control-sm" id="avatar" name="avatar">
                        </div>

                        <div class="my-3 mx-auto">
                            <button type="submit" class="btn btn-success" name="action" value="create">
                                Create
                            </button>
                            <a class="btn btn-outline-secondary " href="../../controllers/UserController.php?page=1">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../libs/jsvalidate.php'; ?>
</body>

</html>