<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reservation</title>
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
    .input-spacing 
    {
        margin-bottom: 8px; /* Adjust as needed */
    }

       
</style>
<body>

<h1 class="text-center heading-with-shadow">Golden Standard's Resort</h1>
                             
<nav class="navbar navbar-expand-sm bg-success navbar-dark">
    <!-- company's logo -->
    <a class="navbar-brand" href="index.php">
        <img src="logo.png" alt="logo" style="width:60px;">
    </a>

    <!-- hamburger icon -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
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
                <a class="nav-link" href="Activites.php">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Reservation.php">Reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Comments.php">Coomments</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <h1 class="text-left">Reservation at Golden Standard's Resort</h1>
    <form class="form-horizontal" method = "post" action = "Reservation2.php">
	<div class = "row">
		<label class="control-label col-sm-2">First Name:</label>
             		<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "fname" required autofocus></div>
        </div>

        <div class = "row">
        	<label class="control-label col-sm-2">Last Name:</label> 
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "lname" required></div>
	</div>

        <div class = "row">
        	<label class="control-label col-sm-2">Number & Street:</label> 
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "street" required></div>
	</div>

        <div class = "row">
        	<label class="control-label col-sm-2">City:</label> 
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "city" required></div>
	</div>

	<div class = "row">
	        <label class="control-label col-sm-2">State:</label> 
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "state" required></div>
	</div>

	<div class = "row">
        	<label class="control-label col-sm-2">Zip-code:</label> 
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "zip" maxlength = "5" required></div>
	</div>

 	<div class = "row">
       		<label class="control-label col-sm-2">Check In Date:</label>
                	<div class="col-sm-10"><input type = "date" class = "form-control input-spacing" name = "CHdte" required></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">Check Out Date:</label>
                	<div class="col-sm-10"><input type = "date" class = "form-control input-spacing" name = "OUTdte" required></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">Numebr Of People:</label>
                	<div class="col-sm-10"><input type = "number" class = "form-control input-spacing" name = "people" required></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">Room Type:</label>
	       		<div class="col-sm-10"><select name = "RoomType" class = "form-control input-spacing" required>
	     			<option>King</option>
             			<option>Queen</option>
             			<option>Suite</option>
             		</select></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">Phone:</label>
            		<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "phone" placeholder = "(555) 555-5555" pattern="\(\d{3}\) \d{3}-\d{4}" maxlength = "14" required></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">E-mail Address: </label>
	        	<div class="col-sm-10"><input type = "email" class = "form-control input-spacing" name = "mail" placeholder = "name@domain.com" required></div>
	</div>

	<div class = "row">
		<label class="control-label col-sm-2">Payment Method:</label>
	     		<div class="col-sm-10"><select name = "payment" class = "form-control input-spacing" required>
				<option>MC</option>
             			<option>VISA</option>
             			<option>AMEX</option>
                		<option>Discover</option>
             		</select></div>
	</div>

        <div class = "row">
		<label class="control-label col-sm-2">Card Number:</label>
                	<div class="col-sm-10"><input type = "text" class = "form-control input-spacing" name = "card" placeholder = "Enter your card number: 5555-5555-5555" pattern="\d{4}-\d{4}-\d{4}-\d{4}" maxlength = "19" required></div>
	</div>

	<div class = "row">
		<label class="control-label col-sm-2">Special requests:</label>
	        	<div class="col-sm-10"><textarea class="form-control input-spacing" rows = "4" placeholder = "Give a clear description of request please." name="comment"></textarea></div>
	</div>

	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
      			<button type="submit" class="btn btn-primary">Reserve a room</button>			
			<button type="reset" class="btn btn-success ml-2">Clear</button>
		</div>
        </div>    
    </form>
</div>

<nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
    <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
    <p class="footer-text">email:goldenstandard@gmail.com</p>
</nav>

</body>
</html>
