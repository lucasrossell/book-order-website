<?php
//    PHP stuff goes here
require_once "config.php";
//?>


<!DOCTYPE html>
<html lang="en">
<head>
        <title>Dashboard View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="dash">
        <div id="sidebar-nav" class="sidebar-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a class="active-nav" href="dashboard.php">Home</a>
            <a href="bookRequest.php">New Book Order </a> <!-- redirects to create a new request -->
            <a href="usersList.php">View All Users</a> <!-- When clicked shows the form on Dashboard Page in aside below// DO WE NEED THIS HERE?-->
            <a href="#">Change Password</a><!-- TODO: Create Change Password Screen-->
            <a href="#">Log-Out</a><!-- TODO: Create Log-Out Screen-->
        </div>

    <div id="main" class="dash-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer position:absolute;" onclick="openNav()">&#9776; Dashboard</span>
<!--        <h2>Dashboard content??</h2>-->
<!--        TODO: Add PHP to display Open Orders here -->

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
