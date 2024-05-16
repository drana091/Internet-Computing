<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="projectstyle.css">
</head>
<body>
    <h2>Login</h2>
    <form action="index.php" method="post">
        <label for="username">Username/Email:</label><br>
        <input type="text" class="form-control" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" class="form-control" id="password" name="password" required><br><br>
        <input type="submit" class="btn" value="Login">
    </form>
    <button class="btn" onclick="location.href='create_account.php'">Create Account</button>
</body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Inlcude the database connection file
    include 'database.php';

    // Attempt database connection using PDO
    try {
        $conn = new PDO($dsn, $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to fetch user data
        $stmt = $conn->prepare("SELECT * FROM users WHERE (username = :username)");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verify password
            if (password_verify($password, $user['password'])) {
                // If password is corect, check if user is admin
                if ($user['is_admin'] == 1) {
                    // User is admin, create session and redirect to admin dashboard
                    $_SESSION['adminID'] = $user['userID']; // Store adminID in session
                    header("location: admin_home.php"); // Redirect to admin dashboard
                    exit();
                } else {
                    // User is not admin, create session and redirect to user dashboard
                    $_SESSION['userID'] = $user['userID']; // Store userID in session
                    header("location: home.php"); // Redirect to user dashboard
                    exit();
                }
            } else {
                // Invalid password, display error message
                echo "Invalid username/email or password.";
            }
        } else {
            // User not found, display error message
            echo "User not found.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
</html>
