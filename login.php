<?php include('server.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection</title>
    <!--LINKS HERE-->
    <link rel="stylesheet" href="sign.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color:  #7C162E;">
    <div class="container-fluid frame-log">
      <div class="row mt-5 frm-boot justify-content-center">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <h2>Login Form</h2>
              <form method="post" action="login.php">
                <?php include('errors.php'); ?>
                <div class="mb-3">
                  <label for="identifier" class="form-label">Email or Phone Number</label>
                  <input type="text" class="form-control" id="placeholder" name="identifier" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="placeholder" name="password" value="<?php echo $password; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                <p>Don't have account yet? <a href="registration.php">Register</a> here.</p>
              </form>
            </div>
            <div class="col-md-6">
              <img src="8.png" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>