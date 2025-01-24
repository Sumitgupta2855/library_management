<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $issue_date = date('Y-m-d');

    // Check if the book is available
    $checkBook = "SELECT * FROM books WHERE id = $book_id AND status = 'Available'";
    $result = $conn->query($checkBook);

    if ($result->num_rows > 0) {
        // Issue the book
        $sql = "INSERT INTO issued_books (user_id, book_id, issue_date) VALUES ($user_id, $book_id, '$issue_date')";
        $updateBookStatus = "UPDATE books SET status = 'Issued' WHERE id = $book_id";

        if ($conn->query($sql) === TRUE && $conn->query($updateBookStatus) === TRUE) {
            echo "Book issued successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Book not available!";
    }
}
?>
