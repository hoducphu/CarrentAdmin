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
  <div class="splash-container" id="login">
    <div class="card" style="min-width: 350px;">
      <div class="card-header form-header text-center d-flex justify-content-center align-items-center rounded-top flex-column">
        <i class="icon bi bi-person-circle"></i>
        <div class="mb-2">Login Form</div>
      </div>
      <div class="card-body">
        <form action="../../controllers/UserController.php?page=1" method="POST" id="login_form">
          <div class="form-group">
            <label for="">Username</label>
            <input class="form-control " name="username" type="text" placeholder="Username">
          </div>
          <div class=" form-group">
            <label for="">Password</label>
            <input class="form-control " name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
            </label>
          </div>
          <button type="submit" name="action" value="login" class="btn btn-block" style="width: 100%; color: #fff; background-color: #339d91">Login</button>
        </form>
      </div>
      <div class="form-group form-check mx-4 my-3 d-flex justify-content-between">
        <span class="login-footer"><a href="">Forget Password?</a></span>
      </div>
    </div>
  </div>
  <?php include '../../libs/jsvalidate.php'; ?>
</body>

</html>