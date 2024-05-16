<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activites</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    
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
        <div class="container-fluid">
          <h2 class="text-left">Activities at Pacific Trail</h2>
          <div class=" text-center row">
            <div class="col-sm-6 mb-4 mb-sm-2 mb-md-2 mb-lg-2 mb-xl-2">
                <div>
                    <a href="one.jpg" data-lightbox="activities" data-title="Sunset Veiw">
                        <img src="one.jpg" alt="sunset" width="300px">
                    </a>
                </div> 
            </div>
            <div class="col-sm-6 mb-4 mb-sm-2 mb-md-2 mb-lg-2 mb-xl-2">
                <div>
                    <a href="two.jpg" data-lightbox="activities" data-title="Pool">
                        <img src="two.jpg" alt="pool" width="300px">
                    </a>
                </div>
            </div>
          </div>
          <div class="text-center row">
            <div class="col-sm-6 mb-4 mb-sm-2 mb-md-2 mb-lg-2 mb-xl-2">
                <div>
                    <a href="three.jpg" data-lightbox="activities" data-title="Forest">
                        <img src="three.jpg" alt="forest" width="300px">
                    </a>
                </div>   
            </div>
            <div class="col-sm-6 mb-4 mb-sm-2 mb-md-2 mb-lg-2 mb-xl-2">
                <div>
                    <a href="four.jpg" data-lightbox="activities" data-title="Beach">
                        <img src="four.jpg" alt="beach" width="300px">
                    </a>
                </div>
            </div>
          </div>
        </div>
  <nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
    <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
    <p class="footer-text">email:goldenstandard@gmail.com</p>
  </nav>

  </body>
</html>



