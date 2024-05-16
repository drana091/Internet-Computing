<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
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
<br>

<div class="container-fluid"><strong>
  <h4>Golden Standard's Resort offers a special lodging experience on the New Jersey Estern Cost. </h4>
  <h4>Relax in serenity with Panoramic views of the Atlantic Ocean</h4>
  <ul>
    <li>Private yurts with decks overlooking the ocean</li>
    <li>Activites lodge with fireplace and gift shop</li>
    <li>Nightly find dining at the Overlook Cafe</li>
    <li>Heated outdoor pool and whirlpool </li>
    <li>Guided hiking tours of the redwoods</li>
  </ul>

  <p>Golden Standard's Resort</p>
  <p>One Normal Ave Montclair</p>
  <p>New Jersey NJ 07043</p>
  <p>973-655-4166</p>
  
</strong></div>
<nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
  <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
  <p class="footer-text">email:goldenstandard@gmail.com</p>
</nav>
</body>
</html>