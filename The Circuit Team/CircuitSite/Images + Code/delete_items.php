<?php
    session_start();

    // Include the database connection file
    include_once 'database.php';

    // Check if admin session is set, else redirect to login page
    if (!isset($_SESSION['adminID'])) {
        header("Location: loginpage.php");
        exit();
    }

    // Check if itemID is provided in the URL
    if (!isset($_GET['itemID'])) {
        // Redirect or handle error accordingly
        header("Location: admin_home.php");
        exit();
    }

    $itemID = filter_input(INPUT_GET, 'itemID', FILTER_SANITIZE_NUMBER_INT);

    try {
        // First delete related records from the cart table
        $queryDeleteCart = "DELETE FROM cart WHERE itemID = :itemID";
        $stmtDeleteCart = $db->prepare($queryDeleteCart);
        $stmtDeleteCart->bindParam(':itemID', $itemID, PDO::PARAM_INT);
        $stmtDeleteCart->execute();

        // Proceed with deleting the product from the items table
        $queryDeleteItem = "DELETE FROM items WHERE itemID = :itemID";
        $stmtDeleteItem = $db->prepare($queryDeleteItem);
        $stmtDeleteItem->bindParam(':itemID', $itemID, PDO::PARAM_INT);
        $stmtDeleteItem->execute();

        // Redirect to the admin home after successful deletion
        header("Location: admin_home.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
?>