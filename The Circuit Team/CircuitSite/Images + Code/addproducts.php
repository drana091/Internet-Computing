<?php
session_start();
if (!isset($_SESSION['userID'])) 
{
    header("location: loginpage.php");
    exit();
}
include 'database.php';

// Fetch the maximum MovieID from the database
$stmt = $db->query("SELECT MAX(itemID) AS MaxProductID FROM items");
$maxProductID = $stmt->fetch(PDO::FETCH_ASSOC)['MaxProductID'];
$newProductID = $maxProductID + 1;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Prepare an SQL statement to insert a new movie
    $stmt = $db->prepare("INSERT INTO items (itemID, userID, Title, Description, Price, ListingDate, Status) VALUES (:itemID, :userID, :Title, :Description, :Price, :ListingDate, :Status)");
    
    // Bind parameters
    $stmt->bindParam(':itemID', $newProductID);
    $stmt->bindParam(':userID', $_SESSION['userID']); 
    $stmt->bindParam(':Title', $_POST['Title']);
    $stmt->bindParam(':Description', $_POST['Description']);
    $stmt->bindParam(':Price', $_POST['Price']);
    $stmt->bindParam(':ListingDate', $_POST['ListingDate']);
    $stmt->bindParam(':Status', $_POST['Status']);
    
    // Execute the statement
    if ($stmt->execute()) 
    {
        // Redirect back to movie.php
        header("Location: home.php");
        exit();
    }
    else {
        echo "Error: Unable to add movie";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MSU Movie Center: Add Movie</title>
    <link rel="stylesheet" href="projectstyle.css">
</head>

<body>
<nav class="navbar navbar-expand-sm">

        
<!--hanburg icon -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <img src="directory_explorer-0.png" alt="Menu" style="width: 30px; height: auto;">
</button>

<div class="collapse navbar-collapse container-fluid-nav text-center" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addproducts.php">Add A Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
        </li>
    </ul>
    

</div>

</nav>
    <br>
    <div class="container-fluid">
    <div class="card">
    <div class="blue-bar">
    <p class="blue-text">Welcome</p>
    </div>
    
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group col">
                <strong><label for="Title" style="display: inline-block; width: 215px;">Title:</label></strong>
                <input type="text" id="Title" name="Title" class="form-control" placeholder="Title" style="display: inline-block; width: 235px;" required>
            </div>

            <div class="form-group col">
                <strong><label for="Description" style="display: inline-block; width: 215px;">Description:</label></strong>
                <input type="text" id="Description" name="Description" class="form-control" placeholder="Description" style="display: inline-block; width: 235px;" required>
            </div>

            <div class="form-group col">
                <strong><label for="Price" style="display: inline-block; width: 215px;">Price:</label></strong>
                <input type="number" id="Price" name="Price" class="form-control" placeholder="Price" style="display: inline-block; width: 235px;" required>
            </div>

            <div class="form-group col">
                <strong><label for="ListingDate" style="display: inline-block; width: 215px;">Listing Date:</label></strong>
                <input type="date" id="ListingDate" name="ListingDate" class="form-control" style="display: inline-block; width: 175px;" required>
            </div>

            <div class="form-group col">
                <strong><label for="Status" style="display: inline-block; width: 215px;">Status:</label></strong>
                <input type="text" id="Price" name="Status" class="form-control" placeholder="Status" style="display: inline-block; width: 235px;" required>
            </div>

            <div class="col form-group">
                <input type="submit" value="Add Product" class="btn">
            </div>      
    </form>
    </div>
    </div>
</body>

</html>