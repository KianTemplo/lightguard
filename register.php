<?php
// Define variables and set to empty values
$username = $email = $phone = $role = "";
$password = $confirm = "";
$usernameErr = $emailErr = $phoneErr = $roleErr = $passwordErr = $confirmErr = "";
$success = "";

// Regular expressions for validation
$usernamePattern = "/^[a-zA-Z0-9_]{5,15}$/";                             // letters, numbers, underscore, 5-15 characters
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";    // email format
$phonePattern = "/^(09|\+639)[0-9]{9}$/";                                // 09XXXXXXXXX or +639XXXXXXXXX
$rolePattern = "/^(faculty|facilities|admin)$/";                         // only these roles
$passwordPattern = "/^(?=.*[A-Za-z])(?=.*\d)\S{6,12}$/";                 // 6-12 characters, at least one letter and one number

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username.";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match($usernamePattern, $username)) {
            $usernameErr = "Username must be 5-15 characters: letters, numbers and underscore only.";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Please enter your email address.";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match($emailPattern, $email)) {
            $emailErr = "Please enter a valid email address.";
        } elseif (strlen($email) > 100) {
            $emailErr = "Email must not exceed 100 characters.";
        }
    }

    // Validate phone number (spaces are allowed, e.g. 0917 123 4567)
    if (empty($_POST["phone"])) {
        $phoneErr = "Please enter your phone number.";
    } else {
        $phone = test_input($_POST["phone"]);
        $phoneWithoutSpaces = str_replace(" ", "", $phone);
        if (!preg_match($phonePattern, $phoneWithoutSpaces)) {
            $phoneErr = "Enter a valid PH mobile number (e.g. 09171234567 or +639171234567).";
        }
    }

    // Validate role
    if (empty($_POST["role"])) {
        $roleErr = "Please select your role.";
    } else {
        $role = test_input($_POST["role"]);
        if (!preg_match($rolePattern, $role)) {
            $roleErr = "Please choose a valid role.";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a password.";
    } else {
        $password = $_POST["password"];
        if (!preg_match($passwordPattern, $password)) {
            $passwordErr = "Password must be 6-12 characters with at least one letter and one number (no spaces).";
        }
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $confirmErr = "Please confirm your password.";
    } else {
        $confirm = $_POST["confirm_password"];
        if ($confirm != $password) {
            $confirmErr = "Passwords do not match.";
        }
    }

    // If there are no errors, the registration is successful
    if ($usernameErr == "" && $emailErr == "" && $phoneErr == "" && $roleErr == "" && $passwordErr == "" && $confirmErr == "") {
        $success = "Account created successfully! You can now log in.";
        // Clear the form
        $username = $email = $phone = $role = "";
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
  <title>Register - LightWatch</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
      <div class="auth-card register-card">

        <div class="logo">
          <span class="logo-icon">💡</span>
          LightWatch
        </div>

        <div class="text-center mb-4">
          <h2 class="auth-title">Create your account</h2>
          <p class="auth-subtitle">Register to start using LightWatch.</p>
        </div>

        <?php
        // Show the success message
        if ($success != "") {
            echo "<div class='alert alert-success py-2 small'>$success <a href='login.php' class='alert-link'>Login here</a></div>";
        }
        ?>

        <form action="" method="post" id="registerForm" novalidate>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control <?php if ($usernameErr != "") { echo "is-invalid"; } ?>" id="username" name="username"
              placeholder="Choose a username" value="<?php echo $username; ?>">
            <?php
            if ($usernameErr != "") {
                echo "<div class='invalid-feedback'>$usernameErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="text" class="form-control <?php if ($emailErr != "") { echo "is-invalid"; } ?>" id="email" name="email"
              placeholder="Enter your email" value="<?php echo $email; ?>">
            <?php
            if ($emailErr != "") {
                echo "<div class='invalid-feedback'>$emailErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control <?php if ($phoneErr != "") { echo "is-invalid"; } ?>" id="phone" name="phone"
              placeholder="09XX XXX XXXX" value="<?php echo $phone; ?>">
            <?php
            if ($phoneErr != "") {
                echo "<div class='invalid-feedback'>$phoneErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select <?php if ($roleErr != "") { echo "is-invalid"; } ?>" id="role" name="role">
              <option value="">Select your role</option>
              <option value="faculty" <?php if ($role == "faculty") { echo "selected"; } ?>>Faculty</option>
              <option value="facilities" <?php if ($role == "facilities") { echo "selected"; } ?>>Facilities Staff</option>
              <option value="admin" <?php if ($role == "admin") { echo "selected"; } ?>>Building Admin</option>
            </select>
            <?php
            if ($roleErr != "") {
                echo "<div class='invalid-feedback'>$roleErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control <?php if ($passwordErr != "") { echo "is-invalid"; } ?>" id="password" name="password"
              placeholder="Create a password">
            <?php
            if ($passwordErr != "") {
                echo "<div class='invalid-feedback'>$passwordErr</div>";
            }
            ?>
          </div>

          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control <?php if ($confirmErr != "") { echo "is-invalid"; } ?>" id="confirm_password" name="confirm_password"
              placeholder="Re-enter your password">
            <?php
            if ($confirmErr != "") {
                echo "<div class='invalid-feedback'>$confirmErr</div>";
            }
            ?>
          </div>

          <button type="submit" class="btn auth-btn">Create Account</button>

        </form>

        <p class="bottom-text">
          Already have an account?
          <a href="login.php">Login here</a>
        </p>

      </div>
    </div>

  </div>

</body>

</html>
