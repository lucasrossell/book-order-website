<?php
// Gather session details.
session_start();
include_once "config.php";
$username = $_SESSION['username'];


if(isset($_POST['deleteAll'])) { // delete all books ordered on current user, when button is clicked.
    $sql= "DELETE FROM books where username = '$username'";
    mysqli_query($link, $sql);
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
            <a href="profDash.php">Home</a> <!-- Home button-->
            <a href="bookRequest.php">New Book Order </a>
            <a class="active-nav" href="openOrder.php">View/Edit Open Order</a>
            <a href="profchangePass.php">Change Password</a>
            <a href="logoutPage.php">Log-Out</a>
        </div>

    <div id="main" class="view-order-content">
        <span id="menu-icon" style="font-size:30px;cursor:pointer; position:absolute;" onclick="openNav()">&#9776;  Prof's Dashboard</span><br>
        <h2>Open order available. Here is the information on the Book(s) Ordered:</h2>
        <div class="prof-order-list">
            <table>
                <thead>
                    <td>Title</td>
                    <td>Author(s) Name(s)</td>
                    <td>Edition</td>
                    <td>Publisher</td>
                    <td>ISBN</td>
                    <td>Quantity Ordered</td>
                    <td>Class</td>
                    <td>Semester</td>
                    <td>Edit</td>
                    <td>Delete</td>
            </thead>
        <?php  // PHP To populate the list of books in a table, pulling from database based on the username who requested it.
            $sql= "SELECT order_id, title, author, edition, publisher, ISBN, book_qty, class, semester FROM books where username = '$username'";
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
                    <td><a href="editBookReq.php?order_id=<?php echo $row['order_id']; ?>">Edit</a></td>
                    <td><a href="deleteBookReq.php?order_id=<?php echo $row['order_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </div>
    <div>
        <form action = '' method="POST">
            <button type="deleteAll" name="deleteAll" value="deleteAll">Delete All Book Orders</button>
        </form>
        
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

