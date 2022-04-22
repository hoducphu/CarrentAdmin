<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../libs/css.php") ?>
    <link rel="stylesheet" href="../views/product/product.css">
    <title>Admin - Product</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
                <div class="d-flex flex-row justify-content-between" style="width: 100%;">
                    <a class="btn btn-danger mb-3 " href="../views/product.create/">
                        Add New Product
                    </a>
                    <form action="../controllers/ProductController.php?page=1" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ID" name="carid" required>
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
                                <th scope="col">Car name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Licence Plates</th>
                                <th scope="col">Seat</th>
                                <th scope="col">Color</th>
                                <th scope="col">Category</th>
                                <th scope="col">State</th>
                                <th scope="col">Created Date</th>
                                <th scope="col mx-2">Returned</th>
                                <th scope="col mx-2">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($arrProduct as $product) {
                                $dateCreated = date_create($product['time_created']);
                                echo '<tr>';
                                echo '<td scope="row">' . $product['carid'] . '</td>';
                                echo '<td scope="row">' . $product['car_name'] . '</td>';
                                echo '<td scope="row">' . $product['brand'] . '</td>';
                                echo '<td scope="row">' . $product['licence_plates'] . '</td>';
                                echo '<td scope="row">' . $product['seat'] . '</td>';
                                echo '<td scope="row">' . $product['color'] . '</td>';
                                echo '<td scope="row">' . $product['cate_name'] . '</td>';
                                if ($product['state'] === "0") {
                                    echo '<td scope="row" class="text-success" style="font-weight: 700;">Free</td>';
                                } else {
                                    echo '<td scope="row" class="text-danger" style="font-weight: 700;">Rented</td>';
                                }
                                echo '<td scope="row">' . date_format($dateCreated, "Y-m-d") . '</td>';
                                if ($product['state'] === "0") {

                                    echo '<td><button class="btn btn-secondary btn-sm">Returned</button></td>';
                                } else {
                                    echo '<td><a class="btn btn-success btn-sm" href="../controllers/ProductController.php?action=return&id=' . $product['carid'] . '">Returned</a></td>';
                                }
                                echo '<td><a class="btn btn-warning btn-sm" href="../controllers/ProductController.php?action=editFormShow&id=' . $product['carid'] . '">Edit</a></td>';
                                echo '<td><a class="btn btn-danger btn-sm" href="../controllers/ProductController.php?action=delete&id=' . $product['carid'] . '">Delete</a></td>';
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
                                            echo '<li class="page-item"><a class="page-link" href="../controllers/ProductController.php?page=' . $i . '" tabindex="-1">' . $i . '</a></li>';
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