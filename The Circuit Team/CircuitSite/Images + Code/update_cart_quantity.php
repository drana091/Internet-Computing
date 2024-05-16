<?php
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['userID'])) {
        // Get the current user's ID from the session
        $userID = $_SESSION['userID'];

        if (isset($_POST['itemID']) && isset($_POST['quantity'])) {

            $itemID = filter_var($_POST['itemID'], FILTER_SANITIZE_NUMBER_INT);
            $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);

            // Include the database connection file
            include 'database.php';

            try {
                // Prepare SQL statement to update the quantity in the cart for the current user
                $query = "UPDATE cart SET quantity = :quantity WHERE buyerID = :userID AND itemID = :itemID";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt->bindParam(':itemID', $itemID, PDO::PARAM_INT);
                $stmt->execute();

            } catch (PDOException $e) {
                // Handle database errors
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Handle invalid or missing parameters
            echo "Invalid request";
        }
    }
?>

