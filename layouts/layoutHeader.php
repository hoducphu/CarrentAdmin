<nav class="navbar navbar-light ">
    <a class="navbar-brand d-flex justify-content-center align-items-center" href="../../controllers/OrderPendingController.php?page=1">
        <div class="logo">Admin</div>
    </a>
    <form action="../controllers/UserController.php" method="POST">
        <div class="user-loggedin d-flex flex-row align-items-center mx-2">
            <div class="text-light mx-3">Hello, <span class="username">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION["is_login"])) {
                        echo $_SESSION["username"];
                    } else {
                        header("Location: ../views/login");
                    }
                    ?></span>
            </div>
            <img src="../../assets/<?php if (!isset($_SESSION)) {
                                        session_start();
                                    }
                                    if (isset($_SESSION["is_login"])) {
                                        echo $_SESSION["avatar"];
                                    } else {
                                        header("Location: ../views/login");
                                    } ?>" class="user-avatar-md rounded-circle" width=32 height=32>
            <a class="logout text-light btn " style="width:100px" href="../../controllers/UserController.php?action=logout">
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION["is_login"])) {
                    echo 'Logout';
                } else {
                    header("Location: ../views/login");
                }
                ?>
            </a>
        </div>
    </form>
</nav>