<?php
    include ('users.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username=$_POST['username'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];

        if(array_key_exists($username, $users)) {
            $error="Username already exists";
        }
        else{
            if($password1==$password2) {
                $password=md5($password1);
                $users[$username]=array($password);
                file_put_contents('users.php', '<?php $users=' . var_export($users, true) .';');
                header('location:login.php');
                exit();
            }

            else{ 
                $error="Incorrect password";
            }
        }

    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 100vh; 
        }
        .register-box {
            padding: 2rem;
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background-color: #001C30">
    <div class="container register-container">
        <div class="col-md-4 register-box">
            <h1 class="text-center mb-4">Register</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <?php if(isset($error)): ?> 
                    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter your password"  required>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn w-100" style="background-color: #DAFFFB; ">Register</button>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


















<!--pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$"-->