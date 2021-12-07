<?php 
include_once "config.php";
session_start();

if(isset($_POST['reset'])) {
    header("location: resetPass.php"); exit;
}

if(isset($_POST['logout'])) {
    header("location: logoutPage.php"); exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Professor's Dashboard View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="dash">
        <div id="sidebar-nav" class="sidebar-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a class="active-nav" href="profDash.php">Home</a> <!-- Home button-->
            <a href="bookRequest.php">New Book Order </a>
            <a href="openOrder.php">View/Edit Open Order</a>
            <a href="resetPass.php">Reset Password</a>
            <a href="logoutPage.php">Log-Out</a>
        </div>

    <div id="main" class="dash-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer; position:absolute;" onclick="openNav()">&#9776;  Menu</span><br>
        <h1>Professor Dashboard</h1>
		<h2>Welcome to your dashboard</h2>
		<p>From here you can use the navigation bar on the left where you will find links for</p>
       <div class="adminList">
		<dl>
		<dt><a class="active-nav" href="profDash.php">Home</a></dt>
		<dd>Takes you back to your home page, which is this dashboard.</dd><br>
		<dt><a href="bookRequest.php">New Book Order </a></dt>
		<dd>Takes you to the page where you can create a new book order</dd><br>
        <dt><a href="openOrder.php">View/Edit Open Order</a></dt>
		<dd>Allows you to review and edit book requests forms that haven't been completed yet.</dd>
		</dl>
        <form method="POST">
            <input type="submit" name="reset" value="Reset Password">
            <input type="submit" name="logout" value="Logout">
        </form>
		</div>

    </div>
        <script>
            function openNav() {
                document.getElementById("sidebar-nav").style.width = "250px";
                document.getElementById("menu-icon").style.display = "none";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("sidebar-nav").style.width = "0";
                document.getElementById("menu-icon").style.display = "";
                document.getElementById("main").style.marginLeft= "0";
            }
        </script>
    </body>
</html>
