<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM admins WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Username or Email already exists!";
    } else {
        // Insert the new admin into the database
        $sql = "INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Admin registered successfully!";
            header('Location: ../admin_login.html'); // Redirect to admin login page
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
