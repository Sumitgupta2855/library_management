<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Check if the username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        header('Location: ../customer_login.html');
    } else {
        // Insert the new user into the database
        $insertQuery = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'customer')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Registration successful!";
            header('Location: ../customer_login.html'); // Redirect to login page
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
