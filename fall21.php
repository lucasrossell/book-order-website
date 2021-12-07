<?php
include_once "config.php";
$sql = "select * from books where semester='fall21'";
if($result = mysqli_query($link, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        echo "<table>";
            echo "<tr>";
                echo "<th>title<th>";
                echo "<th>author<th>";
                echo "<th>edition<th>";
                echo "<th>publisher<th>";
                echo "<th>ISBN<th>";
                echo "<th>book_qty<th>";
                echo "<th>class<th>";
                echo "<th>semester<th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['edition'] . "</td>";
                echo "<td>" . $row['publisher'] . "</td>";
                echo "<td>" . $row['ISBN'] . "</td>";
                echo "<td>" . $row['book_qty'] . "</td>";
                echo "<td>" . $row['class'] . "</td>";
                echo "<td>" . $row['semester'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not be able to execute $sql." . mysqli_error($link);
}
mysqli_close($link);
?>
