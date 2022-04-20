<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../libs/css.php") ?>
    <link rel="stylesheet" href="../views/orderpending/orderpending.css">
    <title>Admin - Order</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                    </ol>
                </nav>

                <form action="../controllers/OrderPendingController.php?page=1" method="POST">
                    <div class="input-group mb-3" style="width:30%">
                        <input type="text" class="form-control" placeholder="ID" name="order_id">
                        <button type="submit" class="btn btn-secondary" id="basic-addon2" name="action" value="search">
                            Search
                        </button>
                    </div>
                </form>

                <div class="view-table">
                    <table class="table table-hover table-striped table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Car name</th>
                                <th scope="col">Price</th>
                                <th scope="col">State</th>
                                <th scope="col">Created Date</th>
                                <th scope="col mx-2">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($arrOrder as $order) {
                                echo '<tr>';
                                echo '<td scope="row">' . $order['orderid'] . '</td>';
                                echo '<td scope="row">' . $order['customer'] . '</td>';
                                echo '<td scope="row">' . $order['car_name'] . '</td>';
                                echo '<td scope="row">' . $order['total_price'] . '</td>';
                                if ($order['state'] === "0") {
                                    echo '<td scope="row" class="text-danger" style="font-weight: 700;">Pending</td>';
                                } else {
                                    echo '<td scope="row" class="text-success" style="font-weight: 700;">Resolved</td>';
                                }
                                echo '<td scope="row">' . $order['order_date'] . '</td>';
                                echo '<td><a class="btn btn-success btn-sm" href="../controllers/OrderPendingController.php?action=conform&id= ' . $order['orderid'] . '">Conform</a></td>';
                                echo '<td><a class="btn btn-danger btn-sm" href="../controllers/OrderPendingController.php?action=reject&id= ' . $order['orderid'] . '">Reject</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination d-flex flex-row ">
                            <li class="page-item disabled">
                                <?php if (isset($page_count)) {
                                    if ($page_count > 0) {
                                        for ($i = 1; $i <= $page_count; $i++) {
                                            if ($i == $page) {
                                                echo '<li class="page-item disabled"><a class="page-link" tabindex="-1">' . $i . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="../controllers/OrderPendingController.php?page=' . $i . '" tabindex="-1">' . $i . '</a></li>';
                                            }
                                        }
                                    }
                                } else {
                                    echo "";
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