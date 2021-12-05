<!--TODO - Add User type selection when creating accounts, i.e. superuser/admin, faculty, professor-->
<!--TODO - in PHP: have submit button redirect page after registering to the dashboard page -->
<?php
require_once 'config.php';
 //This section is currently broken
// I am working on making this correctly interact with the mysql server.
// Define variables and initialize with empty values
$username = $password = $confirm_password = $userEmail = $fullName = "";
$username_err = $password_err = $confirm_password_err = $email_err = $fullName_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Include config file
    require_once 'config.php';

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = $userEmail = $fullName = "";
    $username_err = $password_err = $confirm_password_err = $email_err = $fullName_err = "";
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT username FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate fullName
    if(empty(trim($_POST["fullName"]))){
        $fullName_err = "Please confirm full name.";
    } else{
        $fullName = trim($_POST["fullName"]);
    }

    // Validate email
    if(empty(trim($_POST["userEmail"]))){
        $email_err = "Please confirm email.";
    } else{
        $userEmail = trim($_POST["userEmail"]);
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($fullName_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, fullName, userEmail) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'ssss', $param_username, $param_password, $param_fullName, $param_email);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fullName = $fullName;
            $param_email = $userEmail;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: loginPage.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<head>
    <title>Sign Up</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">

<body id="register-body">
<div class="signUpBox">
    <img src="images/avatar.png" class ="avatar" alt="Avatar">
    <h1>Sign Up Here</h1>
    <h2>Please fill this form to create an account.</h2><br/>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        <p>Username</p>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Create Your Username">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        <p>Password</p>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Enter Password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        <p>Confirm Password</p>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Re-Enter Password">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        <p>Full Name </p>
            <input type="text" name="fullName" class="form-control <?php echo (!empty($fullName_err)) ? 'is-invalid': ''; ?>" value="<?php echo $fullName; ?>" placeholder="Enter Your Full Name">
            <span class="invalid-feedback"><?php echo $fullName_err; ?></span>
        <p>Email</p>
            <input type="text" name="userEmail" class="form-control <?php echo(!empty($email_err)) ? 'is-invalid': ''; ?>" value="<?php echo $userEmail; ?>" placeholder="Enter Your Email">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
        <input type="submit" name="" value="Submit" id="sub-click"><br/>
        <a href="loginPage.php">Already have an account? Login here.</a>
            </form>
        </div>
    </body>
</html>