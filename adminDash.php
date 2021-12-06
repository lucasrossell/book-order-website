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
    <!-- Nav bar for admins -->
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
        <h2>Welcome to your dashboard</h2>
		<p>From here you can use the navigation bar on the left where you will find links for</p>
		<dl>
		<div class="adminList">
		<dt><a class="active-nav" href="adminDash.php">Home</a></dt>
		<dd>Takes you back to your home page, which is this dashboard.</dd>
		<dt><a href="usersList.php">View faculty database </a></dt>
		<dd>Allows you to view every faculty members username, name, and email address. From here you can also edit each memeber or delete them.</dd>
		<dt><a href="deadlineEmail.php">Broadcast an email for deadlines </a></dt>
		<dd>Sends out an email to every member notifing them of the deadline to place a book order request.</dd>
        <dt><a href="deleteUsers.php">Delete an existing account </a></dt>
		<dd>Takes you to a page where you are able to delete an existing members account.</dd>
        <dt><a href="register.php">Create a new account </a></dt>
		<dd>Allows you to create a account for a new member.</dd>
        <dt><a href="invEmail.php">Send invitation email </a></dt>
		<dd>Allows you to send an email to a new member so they can register to create book requests.</dd>
        <dt><a href="adminOrders.php">View list of book requests</a></dt>
		<dd>Takes you to a page that has all the books requests, which includes the title, author's name, edition, publisher, ISBN, and ammount ordered.</dd>
        <dt><a href="adminReq.php">Create Final Book Request</a></dt>
		<dd>Allows you to create a final book request</dd>
        <dt><a href="resetPass.php">Change Password</a></dt>
		<dd>Lets you change your password if need be.</dd>
        <dt><a href="logoutPage.php">Log-Out</a></dt>
		<dd>Logs you out of the system.</dd>
		</dl>
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
