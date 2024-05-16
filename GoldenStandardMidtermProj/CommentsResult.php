<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comments</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    p{
      margin-bottom: 1px;
    }
    .heading-with-shadow{
      text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
    }
</style>
</head>
<body>

<h1 class="text-center heading-with-shadow">Golden Standard's Resort</h1>

<nav class="navbar navbar-expand-sm bg-success navbar-dark">
<!-- company's logo -->
  <a class="navbar-brand" href="index.php">
    <img src="logo.png" alt="logo" style="width:60px;">   
  </a>  

<!--hanburg icon -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse container-fluid-nav text-center" id="collapsibleNavbar">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Yurts.php">Yurts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Activites.php">Activites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Reservation.php">Reservation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Comments.php">Comments</a>
    </li>
  </ul>
  </div>  
</nav>

<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

if (!empty($name)) {
    $greeting = "Dear $name, thank you for your comments!";
} elseif (!empty($email)) {
    $greeting = "Dear $email, thank you for your comments!";
} else {
    $greeting = "Dear Guest, thank you for your comments!";
}
?>
<div class="container-fluid">
    <h1><?php echo $greeting; ?> </h1>
</div>

<nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
    <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
    <p class="footer-text">email:goldenstandard@gmail.com</p>
</nav>

</body>
</html>