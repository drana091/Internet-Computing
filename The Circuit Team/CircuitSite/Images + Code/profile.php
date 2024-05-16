<?php
session_start();
if (!isset($_SESSION['userID'])) 
{
    header("location: index.php");
    exit();
}
    include 'database.php';


    //this is for items
    $queryProducts = 'SELECT * FROM items WHERE userID = :userID';
    $statement = $db->prepare($queryProducts);
    $statement->bindValue(':userID', $_SESSION['userID']);
    $statement->execute();
    $itemz = $statement->fetchAll();
    $statement->closeCursor();

    

    $queryUser = 'SELECT * FROM users WHERE userID = :userID';
    $statement = $db->prepare($queryUser);
    $statement->bindValue(':userID', $_SESSION['userID']);
    $statement->execute();
    $userz = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Welcome</title>
    <link rel="stylesheet" href="projectstyle.css">
</head>
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
    
    <section class="container-fluid">
        <?php foreach ($userz as $users) : ?>
            <br>
            
            <div class="card">
                <div class="blue-bar">
                <p class="blue-text">Profile</p>
                </div>
                <br>
                <p><strong>Username:</strong> <?php echo $users['username']; ?></p>
                <p><strong>UserID:</strong> <?php echo $users['userID']; ?></p>
                <p><strong>Email-Address:</strong> <?php echo $users['emailAddress']; ?></p>
            </div>
        <?php endforeach; ?>
        <br>
        <h1 style="color: white;">Your Items</h1>
        <?php if (empty($itemz)) : ?>
            <p>Sorry, no results found.</p>
        <?php else: ?>
        <?php foreach ($itemz as $items) : ?>
            
            
            <div class="card">
                <div class="blue-bar">
                <p class="blue-text">Welcome</p>
                </div>
                <br>
                <h3><strong><?php echo $items['Title']; ?></strong></h3>
                <p><strong>ListingDate:</strong> <?php echo $items['ListingDate']; ?></p>
                <p><strong>Description:</strong> <?php echo $items['Description']; ?></p>
                <p><strong>Price: </strong><?php echo $items['Price']; ?></p>
                <p><strong>Status: </strong><?php echo $items['Status']; ?></p>
                <p><strong>UserID: </strong><?php echo $items['userID']; ?></p>
                <form action="editproducts.php" method="get">
                    <input type="hidden" name="itemID" value="<?php echo $items['itemID']; ?>">
                    <button type="submit" class="btn">Edit</button>
                </form>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </section>

    
</body>
</html>
