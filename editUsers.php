<?php
require_once "config.php";

// Fetching data from URL
$username = $_GET['username'];
$qry = mysqli_query($link, "select * from users where username='$username'");
$data = mysqli_fetch_array($qry);

// Once update button is clicked, update
if(isset($_POST['update'])) {
    $fullName = $_POST['fullName'];
    $userEmail = $_POST['userEmail'];

    $edit = mysqli_query($link, "update users set fullname='$fullname', userEmail='$userEmail' where username='$username'");

    if($edit) {
        mysqli_close($link);
        header("location: usersList.php"); 
        exit;
    } else {
        echo mysqli_error($link);
    }
}
if(isset($_POST['cancel'])) {
    header("location: usersList.php"); exit;
}
?>

<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <head>Edit User</head>
    <body>
        <form method="POST">
            <p>FullName:</p>
            <input type="text" name="fullName" value="<?php echo $data['fullName'] ?>" placeholder="Enter Full Name" Required>
            <p>Email:</p>
            <input type="text" name="userEmail" value="<?php echo $data['userEmail'] ?>" placeholder="Enter Email" Required>
            <br><br>
            <input type="submit" name="update" value="Update">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>