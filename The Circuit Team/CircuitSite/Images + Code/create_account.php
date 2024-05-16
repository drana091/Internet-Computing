<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="projectstyle.css">
</head>
<body>
    <h2>Create Account</h2>
    <form action="create_account.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" class="form-control" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" class="form-control" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" class="form-control" id="password" name="password" required><br><br>
        <input type="submit" class="btn" value="Register">
    </form>
    <button class="btn" onclick="location.href='index.php'">Go Back</button>
</body>
<?php
// Include database connection
include 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize input
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Attempt database connection using PDO
    try {
        $conn = new PDO($dsn, $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO users (username, emailAddress, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        // Redirect to login page or display success message
        header("location: index.php"); // Redirect to login page after successful registration
        exit();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>


</html>
