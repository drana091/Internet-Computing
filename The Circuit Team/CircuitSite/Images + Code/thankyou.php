<?php
    session_start();

    // Include database
    include 'database.php';

    // Include the special cart clear navbar
    include 'checkout_cart_clear_navbar.php';
    
    // Check if the user is logged in
    if (!isset($_SESSION['userID']) && empty($_SESSION['cart'])) {
        header("Location: loginpage.php");
        exit();
    }

    // Retrieve the user's ID from the session
    $userID = $_SESSION['userID'];

    // Retrieve the purchased items from the database
    try {
        // Prepare SQL statement to retrieve purchased items for the current user
        $query = "SELECT items.*, cart.quantity FROM items JOIN cart ON items.itemID = cart.itemID WHERE cart.buyerID = :userID";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $purchasedItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        exit();
    }

    // Retrieve and display check out details from session variables
    $firstName = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : "";
    $lastName = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : "";
    $address = isset($_SESSION['address']) ? $_SESSION['address'] : "";
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : "";
    $state = isset($_SESSION['state']) ? $_SESSION['state'] : "";
    $zipCode = isset($_SESSION['zipCode']) ? $_SESSION['zipCode'] : "";
    $phoneNumber = isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : "";
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $paymentMethod = isset($_SESSION['paymentMethod']) ? $_SESSION['paymentMethod'] : "";
    $cardNumber = isset($_SESSION['cardNumber']) ? $_SESSION['cardNumber'] : "";

    // Check if the length of the card number is greater than 4
    if (strlen($cardNumber) > 4) {
        // Extract the last four digits of the card number
        $lastFourDigits = substr($cardNumber, -4);
    } else {
        // If the card number is less than or equal to 4 characters, display it as is
        $lastFourDigits = $cardNumber;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="projectstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        .thankyou-container 
        {
            display: flex;
            justify-content: space-between;
        }
        .purchased-items 
        {
            flex: 1;
        }
        .address-details 
        {
            flex: 1;
        }
        body
        {
            background: #007f82;
            font-family: 'MS Sans Serif';
        }
        .image
        {
            width: 200px;
            height: auto; 
        }
    </style>
</head>
<body>
    <h2>Thank You For Your Purchase!</h2>
    
    <div class="thankyou-container">
        <!-- Display purchased items -->
        <div class="purchased-items">
            <h3>Your Purchased Items:</h3>
            <div class="cart-view">
                <?php foreach ($purchasedItems as $item): ?>
                    <div class="cart-item">
                        <h4><?php echo $item['Title']; ?></h4>
                        <img src="<?php echo $item['Image']; ?>" alt="<?php echo $item['Title']; ?>" class="image">
                        <p><strong>Price: </strong>$<?php echo number_format($item['Price'], 2); ?></p>
                        <p><strong>Quantity: </strong><?php echo $item['quantity']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Display address details -->
        <div class="address-details">
            <h3>Address Details:</h3>
            <p><strong>First Name:</strong> <?php echo $firstName; ?> 
                <strong>Last Name:</strong> <?php echo $lastName ?></p>
            
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>City:</strong> <?php echo $city; ?></p>
            <p><strong>State:</strong> <?php echo $state; ?></p>
            <p><strong>Zip Code:</strong> <?php echo $zipCode; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $phoneNumber; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Payment Method:</strong> <?php echo $paymentMethod; ?></p>
            <p><strong>Card Number: ******</strong> <?php echo $lastFourDigits; ?></p>

        </div>
    </div>
</body>
</html>