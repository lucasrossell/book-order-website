 <?php 
// insert php here
require_once "config.php";
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<head>
    <title>Book Order Website</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body id="login-body">
<div class="login-box">
    <img src="images/avatar.png" class="avatar" alt="Avatar">
    <h1>Login Here</h1>
    <form>
        <p>Username</p>
            <input type="text" name="userName" placeholder="Enter Username">

        <p>Password</p>
            <input type="password" name="Password" placeholder="Enter Password">

        <input type="submit" name="" value="Login">
		<a href="restPass.php">Lost/Forgot your password?</a><br/>
		<a href="register.php"> Don't have an account? Create one here.</a>
    </form>
</div>
</body>
</html> 