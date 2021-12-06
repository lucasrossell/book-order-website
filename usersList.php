<!-- This is the where the superadmin or fault can choose to create a new book order or they can choose to edit a book order or delete a book order -->
<?php
include"config.php";

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="view-order">
        <!-- TODO: edit this navbar for faculty/admin -->
        <div id="sidebar-nav" class="sidebar-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="profDash.php">Home</a>
            <a href="#">New Book Order </a> <!-- redirects to create a new request -->
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
                    <thead>
                        <td>User Name</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Edit User</td>
                        <td>Delete User</td>
                    </thead>
                    <?php  // PHP To populate the list of Users not sure if this php would work

                        $sql= "SELECT username, fullName, userEmail FROM users";
                        $data = mysqli_query($link, $sql);
                        while( $row = mysqli_fetch_array($data) )
                        {
                    ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['fullName']; ?></td>
                            <td><?php echo $row['userEmail']; ?></td>
                            <td><a href="editUsers.php?id=<?php echo $data['id']; ?>">Edit</a></td>
<!--                            <td><a href="delete.php?id=--><?php //echo $data['id']; ?><!--">Delete</a></td> TODO: make delete function for handling deleting from the table-->
                        </tr>
                        <?php
                    }
                    ?>
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

