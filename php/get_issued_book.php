<?php
include 'db.php';

$sql = "SELECT issued_books.id, users.username, books.title, issued_books.issue_date, issued_books.return_date 
        FROM issued_books 
        JOIN users ON issued_books.user_id = users.id 
        JOIN books ON issued_books.book_id = books.id";

$result = $conn->query($sql);

$issuedBooks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $issuedBooks[] = $row;
    }
}
echo json_encode($issuedBooks);
?>
