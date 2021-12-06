<?php
//    PHP stuff goes here
require_once "config.php";
//?>


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
            <a href="resetPass.php">Change Password</a>
            <a href="logoutPage.php">Log-Out</a>
        </div>

    <div id="main" class="dash-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer position:absolute;" onclick="openNav()">&#9776;  Prof's Dashboard</span>
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
