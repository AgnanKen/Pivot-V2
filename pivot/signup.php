<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Default password for WAMP is empty
    $dbname = "pivotpro"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $user = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $conn->real_escape_string($_POST['password']);
    $confirmPass = $conn->real_escape_string($_POST['confirm_password']);

    // Check if passwords match
    if ($pass !== $confirmPass) {
        echo "<script>alert('Passwords do not match.'); window.location.href='signup.html';</script>";
        exit();
    }

    // Insert user data into the database
    $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, `email id`, password) VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful! Please login.'); window.location.href='login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
