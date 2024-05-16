<!DOCTYPE html>
<html lang="en">
<head>
  <title>Yurts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <style>
       p 
       {
      		margin-bottom: 1px; 
       }
       .heading-with-shadow
       {
		text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
       }
  </style>
<body>

<h1 class="text-center heading-with-shadow">Golden Standard's Resort</h1>

<nav class="navbar navbar-expand-sm  bg-success navbar-dark">
<!-- company's logo -->
  <a class="navbar-brand" href="index.php">
    <img src="logo.png" alt="logo" style="width:60px;">   
  </a>  

<!--hanburg icon -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
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


<div class="container-fluid text-left">
  <h3>The Yurts at Pacific Trails</h3>

  <p><strong>What is a yurt?</strong></p>
  <p>Our Luxry yurts are permanent structures four feet off the ground. Each yurt has canvas walls, a wooden floor, and a roof dome that can be opened.</p>
  <br>

  <p><strong>What are the yurts furnished?</strong></p>
  <p>Each yurt is furnished with a queen-size bed with down quilt and gas-fired stove. The luxury camping experience also includes electricity and a sink with  hot and cold running water. Shower and restrrom facilities are located in the lodge.</p>
  <br>

  <p><strong>What should I bring?</strong><p>
  <p>Bring a sense of adventure and some time to relax! Most guests also pack comfortable walking shoes and plan to dress for changing weather layers of clothing.</p>
  
</div>

<nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
    <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
    <p class="footer-text">email:goldenstandard@gmail.com</p>
</nav>
</body>
</html>