<?php 
// Don't believe we need any php.
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin's Dashboard View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body id="dash">
    <div id="sidebar-nav" class="sidebar-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="active-nav" href="adminDash.php">Home</a>
        <a href="usersList.php">View faculty database </a>
        <a href="deadlineEmail.php">Broadcast an email for deadlines </a>
        <a href="deleteUsers.php">Delete an existing account </a>
        <a href="register.php">Create a new account </a>
        <a href="invEmail.php">Send invitation email </a>
        <a href="adminOrders.php">View list of book requests</a>
        <a href="adminReq.php">Create Final Book Request</a>
        <a href="resetPass.php">Change Password</a>
        <a href="logoutPage.php">Log-Out</a>
    </div>

    <div id="main" class="dash-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer position:absolute;" onclick="openNav()">&#9776; </span>
        <h1>Admin Dashboard</h1>
        <h2>Dashboard content??</h2>

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
