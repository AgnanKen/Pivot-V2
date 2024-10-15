<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Database connection
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

// Get the logged-in user's data
$user = $_SESSION['username'];
$sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $user);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $profileName = $row['username'];
    $profileBio = $row['bio'];
    $profilePic = $row['profile_pic']; // Assuming you store the file name in the database
} else {
    echo "User not found.";
    exit();
}

// Close the connection
$sql->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - PivotPro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <header>
        <h1>PivotPro</h1>
    </header>

    <nav>
        <a href="index.html">Home</a>
        <a href="browse.html">Browse Contractors</a>
        <a href="post_contract.html">Post a Contract</a>
        <a href="about.html">About</a>
        <a href="profile.php">Profile</a>
    </nav>

    <section class="profile-container">
        <div class="profile-card">
            <img id="profile-pic" src="<?php echo !empty($profilePic) ? 'uploads/' . $profilePic : 'default-profile.jpg'; ?>" alt="Profile Picture">
            <h2 id="profile-name"><?php echo htmlspecialchars($profileName); ?></h2>
            <p id="profile-bio"><?php echo htmlspecialchars($profileBio); ?></p>
            <button class="btn-primary" id="edit-profile-btn">Edit Profile</button>
        </div>

        <div class="profile-form-container" id="profile-form">
            <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                <label for="profile-name-input">Name</label>
                <input type="text" id="profile-name-input" name="username" value="<?php echo htmlspecialchars($profileName); ?>">

                <label for="profile-bio-input">Bio</label>
                <textarea id="profile-bio-input" name="bio"><?php echo htmlspecialchars($profileBio); ?></textarea>

                <label for="profile-pic-input">Profile Picture</label>
                <input type="file" id="profile-pic-input" name="profile_pic">

                <button type="submit" class="btn-primary">Save Changes</button>
                <button type="button" class="btn-secondary" id="cancel-edit-btn">Cancel</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 PivotPro. All Rights Reserved.</p>
    </footer>
</body>
</html>
