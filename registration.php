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
    <div class="container mt-5 frm-boot">
        <h2>Registration Form</h2>
        <form method="post" action="registration.php">
        <?php include('errors.php'); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="placeholder" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="placeholder" name="phonenumber" value="<?php echo $phonenumber; ?>" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="placeholder" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="placeholder" name="password" value="<?php echo $password; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
            <p>Already have an account? <a href="login.php">Log In</a> here</p>
        </form>
    </div>    
  </body>
</html>