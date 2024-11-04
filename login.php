<?php
session_start();

    include ('users.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(array_key_exists($username, $users)) {
            if(md5($password) === $users[$username][0]) {
                $_SESSION['username'] = $username;
                header('location: index.php');
                exit();
            }
            else {
                $error="Wrong password";
            }
        }
        else {
            $error="Username not found!";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            padding: 2rem;
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background-color: #001C30">
    <div class="container login-container">
        <div class="col-md-4 login-box">
            <h1 class="mb-4 text-center">Login</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <?php if(isset($error)): ?> 
                    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn w-100" style="background-color: #DAFFFB;">Login</button>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>