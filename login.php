<?php
session_start();

// Define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = $error = "";

// Define the correct username and password
$correctUsername = "KianTemplo";
$correctPassword = "KianTemplo";

// Regular expressions for validation
$usernamePattern = "/^[a-zA-Z0-9_]{5,50}$/";                            // letters, numbers, underscore, 5-50 characters
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";  // email format
$passwordPattern = "/^.{6,50}$/";                                       // any characters, 6-50 characters

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username (can be a username or an email)
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter your username or email.";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match($usernamePattern, $username) && !preg_match($emailPattern, $username)) {
            $usernameErr = "Enter a valid username (5-50 letters, numbers or underscore) or email.";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Please enter your password.";
    } else {
        $password = $_POST["password"];
        if (!preg_match($passwordPattern, $password)) {
            $passwordErr = "Password must be 6 to 50 characters.";
        }
    }

    // If there are no errors, check if the username and password are correct
    if ($usernameErr == "" && $passwordErr == "") {
        if ($username === $correctUsername && $password === $correctPassword) {
            $_SESSION["username"] = $username;
            header("Location: index.php");   // go to the dashboard
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - LightWatch</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>

<body class="auth-page">

  <div class="page-wrapper">

    <div class="image-side">
      <img src="bsu.jpg" alt="Batangas State University">
      <div class="image-overlay">
        <div>
          <span class="brand-pill">LIGHTWATCH</span>
          <h1>Smarter classroom monitoring.</h1>
          <p>Monitor classroom lighting and help reduce unnecessary energy consumption.</p>
        </div>
      </div>
    </div>

    <div class="form-side">
      <div class="auth-card">

        <div class="logo">
          <span class="logo-icon">💡</span>
          LightWatch
        </div>

        <div class="text-center mb-4">
          <h2 class="auth-title">Welcome back</h2>
          <p class="auth-subtitle">Sign in to access your dashboard.</p>
        </div>

        <?php
        // Show the error if the username or password is wrong
        if ($error != "") {
            echo "<div class='alert alert-danger py-2 small'>$error</div>";
        }
        ?>

        <form action="" method="post" id="myForm" novalidate>

          <div class="mb-3">
            <label for="username" class="form-label">Username or Email</label>
            <input type="text" class="form-control <?php if ($usernameErr != "") { echo "is-invalid"; } ?>" id="username" name="username"
              placeholder="Enter your username or email" value="<?php echo $username; ?>">
            <?php
            if ($usernameErr != "") {
                echo "<div class='invalid-feedback'>$usernameErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control <?php if ($passwordErr != "") { echo "is-invalid"; } ?>" id="password" name="password"
              placeholder="Enter your password">
            <?php
            if ($passwordErr != "") {
                echo "<div class='invalid-feedback'>$passwordErr</div>";
            }
            ?>
          </div>

          <div class="remember-me form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>

          <button type="submit" class="btn auth-btn">Login</button>

        </form>

        <p class="bottom-text">
          Don't have an account?
          <a href="register.php">Create one</a>
        </p>

      </div>
    </div>

  </div>

</body>

</html>
