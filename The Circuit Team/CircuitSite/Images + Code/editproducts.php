<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Edit Products</title>

    <link rel="stylesheet" href="projectstyle.css">
</head>

<?php
session_start();
if (!isset($_SESSION['userID'])) {
    // Redirect the user to the login page if not logged in
    header("location: loginpage.php");
    exit();
}
include 'database.php';
// Check if a movie ID is provided
if (isset($_GET['itemID']) && is_numeric($_GET['itemID'])) {
    $itemID = $_GET['itemID'];
    
    // Retrieve movie details based on the movie ID
    $stmt = $db->prepare("SELECT * FROM items WHERE itemID = :itemID");
    $stmt->bindParam(':itemID', $itemID);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$movie) {
        echo "Item not found";
        exit;
    }
} else {
    echo "Item ID not provided";
    exit;
}



// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Retrieve form data
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $ListingDate = $_POST['ListingDate'];
    $Status = $_POST['Status'];

    // Prepare and execute the UPDATE query
    $stmt = $db->prepare("UPDATE items SET Title = :Title, ListingDate = :ListingDate, Description = :Description, Price = :Price, Status = :Status  WHERE itemID = :itemID");
    $stmt->bindParam(':itemID', $itemID);
    $stmt->bindParam(':Title', $Title);
    $stmt->bindParam(':ListingDate', $ListingDate);
    $stmt->bindParam(':Description', $Description);
    $stmt->bindParam(':Price', $Price);
    $stmt->bindParam(':Status', $Status);

    

    if ($stmt->execute()) 
    {
        header('Location: profile.php');
        exit;
    } else {
        echo "Error: Unable to update item";
        exit;
    }
}
?>

<body>
<nav class="navbar navbar-expand-sm">

        
<!--hanburg icon -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
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
    <form method="POST">
        <div class="form-group col">
        <label for="Title" style="display: inline-block; width: 140px;"><strong>Title:</strong></label>
        <input type="text" class="form-control" id="Title" name="Title" value="<?php echo $movie['Title']; ?>" style="display: inline-block; width: 235px;" required>
        </div>
        
        <div class="form-group col">
        <label for="ListingDate" style="display: inline-block; width: 140px;"><strong>Listing Date:</strong></label>
        <input type="date" class="form-control" id="ListingDate" name="ListingDate" value="<?php echo $movie['ListingDate']; ?>" style="display: inline-block; width: 175px;" required>
        </div>

        <div class="form-group col">
        <label for="Description" style="display: inline-block; width: 140px;"><strong>Description:</strong></label>
        <input type="text" class="form-control" id="Description" name="Description" value="<?php echo $movie['Description']; ?>" style="display: inline-block; width: 175px;" required>
        </div>

        <div class="form-group col">
        <label for="Price" style="display: inline-block; width: 140px;"><strong>Price:</strong></label>
        <input type="number" class="form-control" id="Price" name="Price" value="<?php echo $movie['Price']; ?>" style="display: inline-block; width: 175px;" required>
        </div>
        
        <div class="form-group col">
        <label for="Status" style="display: inline-block; width: 140px;"><strong>Status:</strong></label>
        <input type="text" class="form-control" id="Status" name="Status" value="<?php echo $movie['Status']; ?>" style="display: inline-block; width: 175px;" required>
        </div>

        <div class="col form-group">
            <input type="submit" value="Update Item" class="btn">
        </div>

        <div class="col form-group"> 
            <button class="btn" onclick="location.href='profile.php'">Go Back</button>
        </div>
    </form>
    </div>
    </div>
</body>



</html>

