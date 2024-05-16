<?php
    session_start();

    // Include the database connection file
    include 'database.php';

    // Check if the user is logged in
    if (!isset($_SESSION['userID'])) {
        header("Location: loginpage.php");
        exit();
    }

    // Get the current user's ID from the session
    $userID = $_SESSION['userID'];

    try {
        // Prepare SQL statement to retrieve cart items for the current user
        $query = "SELECT items.*, cart.quantity FROM items JOIN cart ON items.itemID = cart.itemID WHERE cart.buyerID = :userID";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calculate total price
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $subtotal = $cartItem['Price'] * $cartItem['quantity'];
            $totalPrice += $subtotal;
        }

        // Redirect to the checkout page with the total price
        header("Location: checkout.php?totalPrice=" . $totalPrice);
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        exit();
    }
?>
