<?php
    session_start();
    // Include the database connection file
    include 'database.php';

    if (!isset($_SESSION['userID'])) {
        // Redirect the user to the login page if not logged in
        header("location: loginpage.php");
        exit();
    }

    // Check if itemID is set and not empty
    if (isset($_POST['itemID']) && !empty($_POST['itemID'])) {

        $itemID = filter_var($_POST['itemID'], FILTER_SANITIZE_NUMBER_INT);

        // Get the current user's ID from the session
        $userID = $_SESSION['userID'];

        try {
            // Check if the item already exists in the cart for the current user
            $query = "SELECT * FROM cart WHERE buyerID = :buyerID AND itemID = :itemID";
            $statement = $db->prepare($query);
            $statement->bindParam(':buyerID', $userID, PDO::PARAM_INT);
            $statement->bindParam(':itemID', $itemID, PDO::PARAM_INT);
            $statement->execute();
            $existingCartItem = $statement->fetch(PDO::FETCH_ASSOC);

            if ($existingCartItem) {
                // If the item already exists in the cart, update the quantity
                $query = "UPDATE cart SET quantity = quantity + 1 WHERE buyerID = :buyerID AND itemID = :itemID";
                $statement = $db->prepare($query);
                $statement->bindParam(':buyerID', $userID, PDO::PARAM_INT);
                $statement->bindParam(':itemID', $itemID, PDO::PARAM_INT);
                $statement->execute();
            } else {
                // If the item does not exist in the cart, insert it with quantity 1
                $query = "INSERT INTO cart (buyerID, itemID, quantity) VALUES (:buyerID, :itemID, 1)";
                $statement = $db->prepare($query);
                $statement->bindParam(':buyerID', $userID, PDO::PARAM_INT);
                $statement->bindParam(':itemID', $itemID, PDO::PARAM_INT);
                $statement->execute();
            }
            header("location: home.php");
            exit();
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            exit();
        }
    } else {
        // Redirect back to home page if itemID is not set or empty
        header("location: home.php");
        exit();
    }
?>
