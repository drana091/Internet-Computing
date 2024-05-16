<?php
    session_start();

    // Include the database connection file
    include 'database.php';
    // Include the navbar
    include 'navbar.php';

    // Check if cart items are set in session through user
    if (isset($_SESSION['userID'])) {
        // Get the current user's ID from the session
        $userID = $_SESSION['userID'];
        
        
        // Initialize total price
        $totalPrice = 0;

        // Display cart items for the current user
        echo '<h2>Shopping Cart</h2>';
        echo '<div class="row">';
        try {
            // Prepare SQL statement to retrieve cart items for the current user
            $query = "SELECT items.*, cart.quantity FROM items JOIN cart ON items.itemID = cart.itemID WHERE cart.buyerID = :userID";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
            $stmt->execute();
            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($cartItems as $cartItem) {
                // Display item details in card box format
                echo '<div class="col-md-4">';
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $cartItem['Title'] . '</h5>';
                echo '<img src="' . $cartItem['Image'] . '" class="card-img-top" alt="Item Image">';
                echo '<p class="card-text">Price: $' . number_format($cartItem['Price'], 2) . '</p>';
                // Display quantity selector with dropdown and confirm button
                echo '<label for="quantity_' . $cartItem['itemID'] . '">Quantity:</label>';
                echo '<select id="quantity_' . $cartItem['itemID'] . '" name="quantity">';
                for ($i = 1; $i <= 10; $i++) 
                {
                    echo '<option value="' . $i . '"';
                    if ($i == $cartItem['quantity']) {
                        echo ' selected';
                    }
                    echo '>' . $i . '</option>';
                }
                echo '</select>';
                echo '<button onclick="updateQuantity(' . $cartItem['itemID'] . ')" class="btn">Confirm</button>';

                echo '<p class="card-text" id="subtotal_' . $cartItem['itemID'] . '">Subtotal: $' . number_format($cartItem['Price'] * $cartItem['quantity'], 2) . '</p>';
                echo '<form action="remove_from_cart.php" method="post">';
                echo '<input type="hidden" name="itemID" value="' . $cartItem['itemID'] . '">';
                echo '<button type="submit" class="btn">Remove</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Calculate subtotal for the item
                $subtotal = $cartItem['Price'] * $cartItem['quantity'];

                // Add subtotal to total price
                $totalPrice += $subtotal;
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }

        echo '</div>';

        // Display total price
        echo '<p><strong>Total:</strong> $<span id="totalPrice">' . number_format($totalPrice, 2) . '</span></p>';

        // Button to clear the cart
        echo '<button onclick="clearCart()" class="btn">Clear Cart</button>';

        // Button to checkout
        echo '<button onclick="location.href=\'process_totalcost.php\'" class="btn">Proceed to Checkout</button>';
    } else {
        // Display message if user is not logged in
        echo '<p>Please log in to view your cart.</p>';
    }
?>

<script>
function updateQuantity(itemID) {
    var newQuantity = document.getElementById('quantity_' + itemID).value;
    
    // Send AJAX request to update quantity in the database
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Reload the page to reflect the updated quantity
            location.reload();
        }
    };
    xhttp.open("POST", "update_cart_quantity.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("itemID=" + itemID + "&quantity=" + newQuantity);
}

function clearCart() {
    if (confirm("Are you sure you want to clear your cart?")) {
        // Send AJAX request to clear the cart
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Reload the page to reflect the cleared cart
                location.reload();
            }
        };
        xhttp.open("GET", "clear_cart.php", true);
        xhttp.send();
    }
}
</script>

