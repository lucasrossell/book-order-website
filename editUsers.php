<?php
require_once "config.php";

// Fetching data from URL
$username = $_GET['username'];

// Once update button is clicked, update
if(isset($_POST['update'])) {
    $fullName = $_POST['fullName'];
    $userEmail = $_POST['userEmail'];
    $sql = "update users set fullName = '$fullName', userEmail='$userEmail' where username = '$username'";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        if(mysqli_stmt_execute($stmt)){
            // Redirect to userslist page
            header("location: usersList.php"); exit;
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form method="POST">
            <input type="text" name="fullName" value="<?php echo $data['fullName'] ?>" placeholder="Enter your full name" Required>
            <input type="text" name="userEmail" value="<?php echo $data['userEmail'] ?>" placeholder="Enter your email" Required>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>