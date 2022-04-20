<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include_once("../../libs/css.php") ?>
  <link rel="stylesheet" href="./login.css" />
  <title>Admin - Login</title>
</head>

<body>
  <form class="border rounded" style="width: 300px" action="../../controllers/UserController.php?page=1" method="POST">
    <div class="form-header d-flex justify-content-center align-items-center rounded-top flex-column">
      <i class="icon bi bi-person-circle"></i>
      <div class="mb-2">Login Form</div>
    </div>
    <div class="form-group mx-4 my-3">
      <label for="username">Username</label>
      <input type=" text" class="form-control my-1" id="username" placeholder="Username" name="username" />
    </div>
    <div class="form-group mx-4">
      <label for="password">Password</label>
      <input type="password" class="form-control my-1" id="password" placeholder="Password" name="password" />
    </div>
    <div class="form-group form-check mx-4 my-1">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">Remember me</label>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn my-3 mx-4" style="width: 100%; color: #fff; background-color: #339d91" name="action" value="login">
        Login
      </button>
    </div>
    <div class="form-group form-check mx-4 my-3 d-flex justify-content-between">
      <span class="login-footer"><a href="">Forget Password?</a></span>
    </div>
  </form>
</body>

</html>