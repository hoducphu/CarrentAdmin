<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../libs/css.php") ?>
    <link rel="stylesheet" href="../views/user.edit/useredit.css">
    <title>Admin - User - Edit</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="nav-container fixed-top">
            <?php include_once("../layouts/header.php") ?>
        </div>

        <div class="body-container d-flex flex-row">
            <?php include_once("../layouts/sidebar.php") ?>

            <div class="user-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="UserController.php">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="create-form">
                    <form action="UserController.php" method="POST" class="row g-3 border rounded needs-validation" novalidate enctype="multipart/form-data">
                        <div class="form-header col-md-12 mt-2">User Update Form</div>
                        <div class="col-md-6 my-3">
                            <input type="text" class="form-control" readonly name="id" value="<?php echo $userInfo[0]['id']; ?>" autocomplete="off">
                        </div>
                        <div class="col-md-6 my-3">
                            <input type="text" class="form-control" placeholder="<?php echo $userInfo[0]['username']; ?>" disabled name="username">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" value="<?php echo $userInfo[0]['fullname']; ?>" name="fullname">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" value="<?php echo $userInfo[0]['phonenumber']; ?>" name="phonenumber">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control" value="<?php echo $userInfo[0]['email']; ?>" name="email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" value="<?php echo $userInfo[0]['address']; ?>" name="address">
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
                            <input class="form-control form-control-sm" type="file" id="avatar" name="avatar" value="<?php echo $userInfo[0]['avatar']; ?>">
                        </div>

                        <div class="my-3 mx-auto">
                            <button type="submit" class="btn btn-warning" name="action" value="edit">
                                Update
                            </button>
                            <a class="btn btn-outline-secondary " href="UserController.php?page=1">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>