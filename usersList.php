<!-- This is the where the superadmin or faculty can choose to create a new book order or they can choose to delete users -->
<?php
// Don't believe we need any php.
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
        <!-- Nav bar for admins -->
        <div id="sidebar-nav" class="sidebar-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="adminDash.php">Home</a>
        <a class="active-nav" href="usersList.php">View faculty/users database </a>
        <a href="deadlineEmail.php">Broadcast an email for deadlines </a>
        <a href="deleteUsers.php">Delete an existing account </a>
        <a href="register.php">Create a new account </a>
        <a href="invEmail.php">Send invitation email </a>
        <a href="openOrder.php">View list of book requests</a>
        <a href="adminReq.php">Create Final Book Request</a>
        <a href="resetPass.php">Change Password</a>
        <a href="logoutPage.php">Log-Out</a>
        </div>

        <div id="main" class="view-order-content">
            <span id="menu-icon" style="font-size:30px;cursor:pointer position:absolute;" onclick="openNav()">&#9776; Menu</span>
            <!--        <h2>Dashboard content??</h2>-->

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
                            <td><a href="editUsers.php?id=<?php echo $data['username']; ?>">Edit</a></td>
                            <td><a href="deleteUsers.php?id=<?php echo $data['username']; ?>">Delete</a></td>
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

