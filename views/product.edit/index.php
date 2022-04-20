<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../libs/css.php") ?>
    <link rel="stylesheet" href="../views/product.edit/productedit.css">
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
                        <li class="breadcrumb-item"><a href="../controllers/ProductController.php?page=1">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="create-form">
                    <form action="../controllers/ProductController.php" method="POST" class="row g-3 border rounded" enctype="multipart/form-data">
                        <div class="form-header col-md-12 mt-2">Update Product</div>
                        <div class="col-md-4 my-3">
                            <label for="carid">ID</label>
                            <input type="text" class="form-control" value=<?php echo $productInfo[0]['carid']; ?> name="carid" readonly id="carid">
                        </div>
                        <div class="col-md-4 my-3">
                            <label for="cate">Category</label>
                            <select class="form-select rounded" aria-label="Category" name="cate_id" id="cate">
                                <option selected>Category</option>
                                <option value="1">4 seater car</option>
                                <option value="2">7 seater car</option>
                            </select>
                        </div>
                        <div class="col-md-4 my-3">
                            <label for="carname">Name</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['car_name']; ?>" name="carname" id="carname">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['brand']; ?>" name="brand" id="brand">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Engine</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['engine']; ?>" name="engine" id="engine">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">wattage</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['wattage']; ?>" name="wattage" id="wattage">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Capacity</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['capacity']; ?>" name="capacity" id="capacity">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Size</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['vehical_size']; ?>" name="vehicalsize" id="vehicalsize">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Licence Plates</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['licence_plates']; ?>" name="licenceplates" id="licenceplates">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Color</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['color']; ?>" name="color" id="color">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Price</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['price']; ?>" name="price" id="price">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Undercarriage</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['undercarriage']; ?>" name="undercarriage" id="undercarriage">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="carname">Gearbox</label>
                            <input type="text" class="form-control" value="<?php echo $productInfo[0]['gearbox']; ?>" name="gearbox" id="gearbox">
                        </div>
                        <div class="col-md-12 form-floating">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="Description" id="description" style="height: 100px" name="description"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="carimg" class="form-label">Car image</label>
                            <input type="file" class="form-control form-control-sm" id="carimg" name="carimg">
                        </div>

                        <div class="my-3 mx-auto">
                            <button type="submit" class="btn btn-success" name="action" value="edit">
                                Update
                            </button>
                            <a class="btn btn-outline-secondary " href="../controllers/ProductController.php?page=1">
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