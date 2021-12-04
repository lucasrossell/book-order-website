<?php
//include"config.php";
//?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="view-order">
        <div id="sidebar-nav" class="sidebar-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="dashboard.php">Home</a>
            <a href="bookRequest.php">New Book Order </a> <!-- redirects to create a new request -->
            <a class="active-nav" href="#">View Open Order</a> <!-- When clicked shows the form on Dashboard Page in aside below-->
            <a href="#">Change Password</a><!-- TODO: Create Change Password Screen-->
            <a href="#">Log-Out</a><!-- TODO: Create Log-Out Screen-->
        </div>

        <div id="main" class="view-order-content">
            <span id="menu-icon" style="font-size:30px;cursor:pointer position:absolute;" onclick="openNav()">&#9776; Menu</span>
            <!--        <h2>Dashboard content??</h2>-->
            <!--        TODO: Add PHP to display all Users here -->

            <div class="user-list-table">
                <table>
                    <tr>
                        <td>Account Type</td>
                        <td>Name</td>
                        <td>Email</td>
                    </tr>
<!--                    --><?php
//                        $records = mysqli_query(DB_SERVER, "SELECT * FROM users");
//                        while( $data = mysqli_fetch_array($records))
//                        {
//                    ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $data['username']; ?><!--</td>-->
<!--                            <td>--><?php //echo $data['fullName']; ?><!--</td>-->
<!--                            <td>--><?php //echo $data['userEmail']; ?><!--</td>-->
<!--                        </tr>-->
<!--                        --><?php
//                    }
//                    ?>
                </table>
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
    <?php mysqli_close($link); ?>
    </body>
</html>

