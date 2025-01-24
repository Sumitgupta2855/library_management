<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header('Location: customer_login.html'); // Redirect to login if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Customer Dashboard</h1>
        <p>Welcome, <strong><?php echo $_SESSION['customer_username']; ?></strong> (ID: <?php echo $_SESSION['customer_id']; ?>)</p>
    </header>
    <main>
        <nav>
            <a href="list_books.html">View Available Books</a>
            <a href="issue_books.html">Issue Books</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </main>
</body>
</html>
