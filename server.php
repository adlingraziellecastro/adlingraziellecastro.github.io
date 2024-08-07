<?php
session_start();

$email= "";
$phonenumber = "";
$name="";
$password="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'db_enchanteparfum');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  // receive all input values from the form

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM enchanteparfum_users WHERE email='$email' OR phonenumber='$phonenumber' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
        $query = "INSERT INTO enchanteparfum_users (email, phonenumber, name, password)VALUES('$email', '$phonenumber', '$name', '$password')";
        mysqli_query($db, $query);
        ?>
        <script>
            alert("Registered!");
            window.location="login.php";
        </script>
        <?php
  }
  else {
          // Display errors if registration fails
        ?>
        <script>
            alert("<?php echo implode('\n', $errors); ?>");
            window.location="registration.php";
        </script>
        <?php
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $identifier = mysqli_real_escape_string($db, $_POST['identifier']); // This can be either email or phone number
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $user = "";
  $row = "";

  $result = mysqli_query($db, "SELECT * FROM enchanteparfum_users WHERE email='$identifier' OR phonenumber='$identifier'");

  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      if ($identifier === $row['email'] || $identifier === $row['phonenumber']) {
          if (password_verify($password, $row['password'])) {
              $_SESSION['id'] = $row['id'];
              ?>
              <script>
                  alert("Login Successful");
                  window.location = "figma.html";
              </script>
              <?php
              exit();
          } else {
              array_push($errors, "Wrong password");
          }
      } else {
          array_push($errors, "Account does not exist!");
      }
  } else {
      array_push($errors, "Account does not exist!");
  }
}
?>
