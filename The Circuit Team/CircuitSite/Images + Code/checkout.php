<?php
    session_start();

    // Include database
    include 'database.php';

    // Include the navbar
    include 'navbar.php';

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Store form details in session variables
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['zipCode'] = $_POST['zipCode'];
        $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['paymentMethod'] = $_POST['paymentMethod'];
        $_SESSION['cardNumber'] = $_POST['cardNumber'];
        
        // Redirect to the thankyou.php page after processing the checkout
        header("Location: thankyou.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="projectstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        body
        {
            background: #007f82;
            font-family: 'MS Sans Serif';
        }
        .btn 
        {
            border-bottom: 3px solid black;
            border-right: 3px solid black;
            border-top: 3px solid white;
            border-left: 3px solid white;
    
        }
    </style>
</head>
<body>
    <h2>Checkout</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required autofocus><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>
        
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        
        <label for="zipCode">Zip Code:</label>
        <input type="text" id="zipCode" name="zipCode" maxlength = "5" required><br><br>
        
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" placeholder = "(555) 555-5555" pattern="\(\d{3}\) \d{3}-\d{4}" maxlength = "14" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod" required>
            <option value="creditCard">Credit Card</option>
            <option value="debitCard">Debit Card</option>
            <option value="paypal">PayPal</option>
            <!-- Add more options as needed -->
        </select><br><br>
        
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" placeholder = "5555-5555-5555" pattern="\d{4}-\d{4}-\d{4}-\d{4}" maxlength = "19" required><br><br>
        
        <button calss="btn" type="submit">Check Out</button>
    </form>
</body>
</html>

