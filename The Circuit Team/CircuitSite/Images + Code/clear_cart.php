<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['userID'])) {
        // If not logged in, redirect to login page or handle as desired
        header("Location: login.php");
        exit();
    }

    // Include the database connection file
    include 'database.php';

    // Get the user ID from the session
    $userID = $_SESSION['userID'];

    try {
        // Prepare SQL statement to delete all cart items for the logged-in user
        $query = "DELETE FROM cart WHERE buyerID = :userID";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        // Return success response
        echo "Cart cleared successfully";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
?>
