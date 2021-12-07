<!-- This is where admins can view the list of open orders -->
<?php
include_once "config.php"
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
    <!-- Nav bar for admins -->
    <div id="sidebar-nav" class="sidebar-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="adminDash.php">Home</a>
        <a href="usersList.php">View faculty database </a>
        <a href="deadlineEmail.php">Broadcast an email for deadlines </a>
        <a href="deleteUsers.php">Delete an existing account </a>
        <a href="register.php">Create a new account </a>
        <a href="invEmail.php">Send invitation email </a>
        <a class="active-nav" href="adminOrders.php">View list of book requests</a>
        <a href="pickSemester.php">Create Final Book Request</a>
        <a href="changePass.php">Change Password</a>
        <a href="logoutPage.php">Log-Out</a>
    </div>

    <div id="main" class="dash-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer; position:absolute;" onclick="openNav()">&#9776;  Admin's Dashboard</span>
        <br>
        <h2>Open order available. Here is the information on the Book(s) Ordered:</h2>
        <table class="prof-order-list">
            <tr>
                <th>Title</th>
                <th>Author(s) Name(s)</th>
                <th>Edition</th>
                <th>Publisher</th>
                <th>ISBN</th>
                <th>Quantity Ordered</th>
                <th>Class</th>
                <th>Semester</th>
            </tr>
        <?php  // PHP To populate the list of books not sure if this php would work
            $sql= "SELECT title, author, edition, publisher, ISBN, book_qty, class, semester FROM books";
            $data = mysqli_query($link, $sql);
            while( $row = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['edition']; ?></td>
                    <td><?php echo $row['publisher']; ?></td>
                    <td><?php echo $row['ISBN']; ?></td>
                    <td><?php echo $row['book_qty']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><a href="editBookReq.php?id=<?php echo $row['order_id']; ?>">Edit</a></td>
                    <td><a href="deleteBookReq.php?id=<?php echo $row['order_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
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

