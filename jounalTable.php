<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Fictional Books Table</title>
</head>
<body>

<?php
class FictionalBook {
    public $name;
    public $genre;
    public $author;
    

    public function __construct($name, $genre, $author) {
        $this->name = $name;
        $this->genre = $genre;
        $this->author = $author;
    }
}

$fictionalBooks = array(
    new FictionalBook('Pride and Prejudice', 'Romance', 'Jane Austen'),
    new FictionalBook('The Secret History', 'Mystery', 'Donna Tartt')
);


function displayFictionalBooks($fictionalBooks) {
    echo "<table class='table1'>";
    echo "<tr>";
    echo "<th style='background-color: #5c2c1a; color: white; padding: 10px;'>Book</th>";
    echo "<th style='background-color: #5c2c1a; color: white; padding: 10px;'>Genre</th>";
    echo "<th style='background-color: #5c2c1a; color: white; padding: 10px;'>Author</th>";
    echo "</tr>";
    foreach ($fictionalBooks as $book) {
        echo "<tr>";
        echo "<td>{$book->name}</td>";
        echo "<td>{$book->genre}</td>";
        echo "<td>{$book->author}</td>";
        echo "</tr>";
    }
    echo "</table>";
}


displayFictionalBooks($fictionalBooks);
?>

</body>
</html>