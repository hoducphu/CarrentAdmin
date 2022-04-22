<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../libs/layoutCSS.php") ?>
    <link rel="stylesheet" href="./productcreate.css">
    <title>Admin - Product - Create</title>
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
                        <li class="breadcrumb-item"><a href="../../controllers/ProductController.php?page=1">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="create-form">
                    <form action="../../controllers/ProductController.php" method="POST" class="row g-3 border rounded" enctype="multipart/form-data">
                        <div class="form-header col-md-12 mt-2">Add New Product</div>
                        <div class="col-md-6 my-3">
                            <select class="form-select rounded" aria-label="Category" name="cate_id">
                                <option selected>Category</option>
                                <option value="1">4 seater car</option>
                                <option value="2">7 seater car</option>
                            </select>
                        </div>
                        <div class="col-md-6 my-3">
                            <input type="text" class="form-control" placeholder="Car name" name="carname" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Brand" name="brand" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Engine" name="engine" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Wattage" name="wattage" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Capacity" name="capacity" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Vehical Size" name="vehicalsize" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Licence Plates" name="licenceplates" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Color" name="color" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Price (Ex: 200.000)" name="price" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Under Carriage" name="undercarriage" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Gearbox" name="gearbox" required>
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
                            <button type="submit" class="btn btn-info" name="action" value="create">
                                Add New Product
                            </button>
                            <a class="btn btn-outline-secondary " href="../../controllers/ProductController.php?page=1">
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