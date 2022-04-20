<div class="sidebar-container ">
    <div class="menu d-flex justify-contents-between flex-column border-right border-top border-dark ">
        <div class="menu-header dropdown-header d-flex align-items-center border-bottom ">Menu</div>
        <a class="dropdown-item d-flex align-items-center justify-content-start" href="http://localhost:8080/vhu/DACK_WebNC/controllers/OrderPendingController.php?page=1">Pending Order</a>
        <a class="dropdown-item d-flex align-items-center justify-content-start" href="http://localhost:8080/vhu/DACK_WebNC/controllers/OrderController.php?page=1">Order</a>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["is_login"])) {
            if ($_SESSION["role"] === "admin") {
                echo '<a class="dropdown-item d-flex align-items-center justify-content-start" href="http://localhost:8080/vhu/DACK_WebNC/controllers/ProductController.php?page=1">Product</a>';
                echo '<a class="dropdown-item d-flex align-items-center justify-content-start" href="http://localhost:8080/vhu/DACK_WebNC/controllers/UserController.php?page=1">User</a>';
            }
        } else {
            header("Location: ../views/login");
        }
        ?>


    </div>

    <script>
        const origin = window.location.origin;
        const path = window.location.pathname;
        const href = origin + path;

        var menuItem = document.querySelector('.menu').querySelectorAll('a')
        menuItem.forEach((a) => {
            if (a.href === href || a.href === (href + "?page=1")) {
                a.classList.add('ctactive')
                a.classList.add('text-danger')
            } else {
                a.classList.remove('ctactive')
                a.classList.remove('text-danger')
            }
        })

        if (path.endsWith('orderpa.create/') || path.endsWith('orderpa.edit/')) {
            menuItem[0].classList.add('ctactive')
            menuItem[0].classList.add('text-danger')
        }
        if (path.endsWith('orderpa.create/') || path.endsWith('orderpa.edit/')) {
            menuItem[1].classList.add('ctactive')
            menuItem[1].classList.add('text-danger')
        }
        if (path.endsWith('product.create/') || path.endsWith('product.edit/')) {
            menuItem[2].classList.add('ctactive')
            menuItem[2].classList.add('text-danger')
        }
        if (path.endsWith('user.create/') || path.endsWith('user.edit/')) {
            menuItem[3].classList.add('ctactive')
            menuItem[3].classList.add('text-danger')
        }
    </script>
</div>