<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pivotpro";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $user = $conn->real_escape_string(trim($_POST['username']));
    $pass = $conn->real_escape_string(trim($_POST['password']));

    // Prepared statement to prevent SQL injection
    $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $user);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if ($pass==$row['password']) {
            // Password is correct, set session and redirect
            $_SESSION['username'] = $user;
            header("Location: browse.html"); // Redirect to the browse contractors page
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Incorrect password.'); window.location.href='login.html';</script>";
        }
    } else {
        // Invalid username
        echo "<script>alert('Username not found.'); window.location.href='login.html';</script>";
    }

    // Close statement and connection
    $sql->close();
    $conn->close();
}
?>
