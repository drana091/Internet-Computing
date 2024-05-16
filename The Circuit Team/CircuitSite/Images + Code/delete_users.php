<?php
    session_start();

    // Include the database connection file
    include_once 'database.php';
    // Include the navbar
    include 'admin_navbar.php';

    // Check if admin session is set, else redirect to login page
    if (!isset($_SESSION['adminID'])) {
        header("Location: loginpage.php");
        exit();
    }

    // Handle delete user action
    if (isset($_POST['delete_user'])) {
        // Get the user ID to delete
        $userIDToDelete = $_POST['userID'];

        // Check if the user being deleted is not the admin user
        if ($userIDToDelete != $_SESSION['adminID']) {
            try {
                // Prepare SQL statement to delete user from the database
                $query = "DELETE FROM users WHERE userID = :userID";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':userID', $userIDToDelete, PDO::PARAM_INT);
                $stmt->execute();

                // Redirect to refresh the page and display updated user list
                header("Location: delete_users.php");
                exit();
            } catch (PDOException $e) {
                // Handle database errors or display error message
                echo "Error: " . $e->getMessage();
                exit();
            }
        }
    }

    // Retrieve user data from the database
    try {
        // Prepare SQL statement to fetch user data
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="projectstyle.css">
</head>
<body>
    <h2 align="center">Manage Users</h2>
    <!-- Display user data in a table layout -->
    <div class="card container-fluid">
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['userID']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['emailAddress']; ?></td>
                    <td>
                        <!-- Delete button for each user, only display if not admin -->
                        <?php if ($user['userID'] != $_SESSION['adminID']): ?>
                            <form action="" method="post">
                                <input type="hidden" name="userID" class="btn" value="<?php echo $user['userID']; ?>">
                                <button type="submit" name="delete_user" class="btn">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
