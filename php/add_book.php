<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "INSERT INTO books (title, author, genre, year) VALUES ('$title', '$author', '$genre', '$year')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../list_books.html');
        
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
