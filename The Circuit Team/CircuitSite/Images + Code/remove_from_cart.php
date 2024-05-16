<?php
    session_start();

    // Include the database connection file
    include 'database.php';    

    // Check if itemID is set and not empty
    if (isset($_POST['itemID']) && !empty($_POST['itemID'])) {
        // Sanitize and store the itemID
        $itemID = filter_var($_POST['itemID'], FILTER_SANITIZE_NUMBER_INT);

        // Check if the user is logged in
        if (!isset($_SESSION['userID'])) {
            // Redirect to login page if user is not logged in
            header("location: loginpage.php");
            exit();
        }

        // Get the current user's ID from the session
        $userID = $_SESSION['userID'];

        try {
            // Prepare SQL statement to delete item from cart for the current user
            $query = "DELETE FROM cart WHERE buyerID = :userID AND itemID = :itemID";
            $statement = $db->prepare($query);

            // Bind parameters
            $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
            $statement->bindParam(':itemID', $itemID, PDO::PARAM_INT);

            // Execute the statement
            if ($statement->execute()) {
                // Redirect back to the cart page
                header("location: cart.php");
                exit();
            } else {
                // Redirect back to cart page with error message
                header("location: cart.php?error=1");
                exit();
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            exit();
        }
    } else {
        // Redirect back to cart page if itemID is not set or empty
        header("location: cart.php");
        exit();
    }
?>
