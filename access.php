<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infoJournal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search Records
if (isset($_POST['search'])) {
    $searchKeyword = $_POST['keyword'];
    $sql = "SELECT * FROM books WHERE bookName LIKE '%$searchKeyword%' OR bookAuthor LIKE '%$searchKeyword%'";
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Book Name: " . $row["bookName"] . " | Author: " . $row["bookAuthor"] . "<br>";
        }
    } else {
        echo "No results found";
    }
}

// Insert Record
if (isset($_POST['insert'])) {
    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    // Add other fields as needed

    $sql = "INSERT INTO books (bookName, bookAuthor) VALUES ('$bookName', '$bookAuthor')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Delete Record
if (isset($_POST['delete'])) {
    $bookId = $_POST['bookId'];
    $sql = "DELETE FROM books WHERE bookId=$bookId";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Update Record
if (isset($_POST['update'])) {
    $bookId = $_POST['bookId'];
    $newBookName = $_POST['newBookName'];
    $newBookAuthor = $_POST['newBookAuthor'];
    // Add other fields as needed

    $sql = "UPDATE books SET bookName='$newBookName', bookAuthor='$newBookAuthor' WHERE bookId=$bookId";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Display Records
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Added Books</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["bookId"] . $row["bookName"] . " - " . $row["bookAuthor"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No books found";
}

$conn->close();
?>
