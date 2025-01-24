<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND role = 'customer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        if (password_verify($password, $customer['password'])) {
            // Start the session and store customer details
            session_start();
            $_SESSION['customer_id'] = $customer['id'];
            $_SESSION['customer_username'] = $customer['username'];
            header('Location: ../customer_dashboard.php');
            exit;
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Customer not found!";
    }
}
?>
