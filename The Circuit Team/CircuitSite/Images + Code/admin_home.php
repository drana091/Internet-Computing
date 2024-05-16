<?php
session_start();

    // Check if admin session is set, else redirect to login page
    if (!isset($_SESSION['adminID'])) {
        header("Location: loginpage.php");
        exit();
}

    // Inlcude the database connection file
    include 'database.php';

    // Include the navbar
    include 'admin_navbar.php';

    $queryProducts = 'SELECT * FROM items';
    $statement = $db->prepare($queryProducts);
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
<link rel="stylesheet" href="projectstyle.css">
<title>Welcome</title>
<style>
        .image
        {
            width: 200px;
            height: auto; 
        }
    </style>
</head>
<body>
<h2 align="center">Welcome Admin</h2>

<section class="container-fluid">
    <?php foreach ($itemz as $items) : ?>
        <div class="card">
            <h3><strong><?php echo $items['Title']; ?></strong></h3>
            <img src="<?php echo $items['Image']; ?>" alt="<?php echo $items['Title']; ?>" class="image">
            <p><strong>ListingDate:</strong> <?php echo $items['ListingDate']; ?></p>
            <p><strong>Description:</strong> <?php echo $items['Description']; ?></p>
            <p><strong>Price: </strong><?php echo $items['Price']; ?></p>
            <p><strong>Status: </strong><?php echo $items['Status']; ?></p>
            <br>
            <button value="submit" class="btn" onclick="window.location.href='delete_items.php?itemID=<?php echo $items['itemID']; ?>'">DELETE</button>
        </div>
    <?php endforeach; ?>
</section>
</body>
</html>
