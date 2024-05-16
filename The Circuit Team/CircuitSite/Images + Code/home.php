<?php
session_start();
if (!isset($_SESSION['userID'])) 
{
    header("location: index.php");
    exit();
}

    include 'database.php';
    $queryProducts = 'SELECT * FROM items';
    $statement = $db->prepare($queryProducts);
    $statement->execute();
    $itemz = $statement->fetchAll();
    $statement->closeCursor();

    //search filter
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $queryProducts = 'SELECT * FROM items WHERE Title LIKE :search OR Description LIKE :search';
    $statement = $db->prepare($queryProducts);
    $statement->bindValue(':search', '%' . $search . '%');
    $statement->execute();
    $itemz = $statement->fetchAll();
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
    <style>
        .image
        {
            width: 200px;
            height: auto; 
        }
    </style>
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
            
            <form method="get" action="">
            <input type="text" name="search" placeholder="Search products">
            <?php if (isset($_GET['search'])) : ?>
            <a href="home.php"><img src="xbutton.jpg" alt="Italian Trulli" style="width: 30px; height: auto;" class="search-button"></a>
            <?php endif; ?>
            </form>
        </div>

    </nav>
    <section class="container-fluid">
        <?php if (empty($itemz)) : ?>
            <p>Sorry, no results found.</p>
        <?php else: ?>
        <?php foreach ($itemz as $items) : ?>
            <br>
            
            <div class="card">
    <div class="card-body">
        <div class="blue-bar">
            <p class="blue-text">Welcome</p>
        </div>
        <h3><strong><?php echo $items['Title']; ?></strong></h3>
        <div class="row">
            <div class="col-md-8">
                <div class="text-box">
                    <img src="<?php echo $items['Image']; ?>" alt="<?php echo $items['Title']; ?>" class="image">
                    <p><strong>ListingDate:</strong> <?php echo $items['ListingDate']; ?></p>
                    <p><strong>Description:</strong> <?php echo $items['Description']; ?></p>
                    <p><strong>Price:</strong> <?php echo $items['Price']; ?></p>
                    <p><strong>Status:</strong> <?php echo $items['Status']; ?></p>
                    <p><strong>UserID:</strong> <?php echo $items['userID']; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <form action="add_to_cart.php" method="post" class="add-to-cart-form">
                    <input type="hidden" name="itemID" value="<?php echo $items['itemID']; ?>">
                    <button type="submit" class="btn float-right">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <?php endforeach; ?>
        <?php endif; ?>
    </section>

    
</body>
</html>
