<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
	.heading-with-shadow 
    	{
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
                <a class="nav-link" href="Activities.php">Activities</a>
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
  <h2>Thank you <?php print( $_POST["fname"] ); ?> <?php print( $_POST["lname"] ); ?> for your reservation</h2>
  <p>The following are the information that you entered.</p>            
  <table class="table table-striped">     
      <tr>
        <td>Number & Street</td>
        <td><?php print( $_POST["street"] ); ?></td>
      </tr>
      <tr>
        <td> City </td>
        <td><?php print( $_POST["city"] ); ?></td>
      </tr>
      <tr>
        <td> State </td>
        <td><?php print( $_POST["state"] ); ?></td>
      </tr>
      <tr>
        <td> Zip Code </td>
        <td><?php print( $_POST["zip"] ); ?></td>
      </tr>
      <tr>
        <td> Check in date </td>
        <td><?php print( $_POST["CHdte"] ); ?></td>
      </tr>
      <tr>
        <td> Check Out date </td>
        <td><?php print( $_POST["OUTdte"] ); ?></td>
      </tr>
      <tr>
        <td> Room Type </td>
        <td><?php print( $_POST["RoomType"] ); ?></td>
      </tr>
      <tr>
        <td> Number Of People </td>
        <td><?php print( $_POST["people"] ); ?></td>
      </tr>

      <tr>
        <td> Number Of Days </td>
        <td><?php
		// Get the check-in and check-out dates from the form
		$checkInDate = strtotime($_POST["CHdte"]);
		$checkOutDate = strtotime($_POST["OUTdte"]);

		// Calculate the difference in days
		if($checkInDate == $checkOutDate)
		{
			$daysDifference = 1;
			echo $daysDifference;
		}
		else
		{
			$daysDifference = ceil(abs($checkOutDate - $checkInDate) / 86400);

			// Display the total number of days
			echo $daysDifference;
		}
	?></td>
      </tr>

      <tr>
        <td> Email </td>
        <td><?php print( $_POST["mail"] ); ?></td>
      </tr>
      <tr>
        <td> Phone Number </td>
        <td><?php print( $_POST["phone"] ); ?></td>
      </tr>
      <tr>
        <td> Credit Card </td>
        <td><?php print( $_POST["payment"] ); ?></td>
      </tr>
      <tr>
        <td> Card Number </td>
        <td><?php print( $_POST["card"] ); ?></td>
      </tr>
      <tr>
        <td> Special Request </td>
        <td><?php print( $_POST["comment"] ); ?></td>
      </tr>
      <tr>
        <td> Total Charge </td>
        <td><?php
    		// Define room costs
    		$roomCosts = array(
        		"King" => 200,
        		"Queen" => 150,
        		"Suite" => 300
    		);

    		// Get the room type and number of days from the form
    		$roomType = $_POST["RoomType"];
    		$numberOfDays = $daysDifference;

    	
    		// Add tax to the total cost
    		$totalCostWithTax = ($roomCosts[$roomType] * $numberOfDays) * 1.07;

    		// Display the total cost with tax
    		echo "$" . number_format($totalCostWithTax, 2);
	?></td>
      </tr>

  </table>
</div>

<nav class="footer navbar-fixed-bottom text-center text-light bg-secondary">
    <p class="footer-text">Copyright &copy; <?php echo date("Y");?> Golden Standard's Resort</p>
    <p class="footer-text">email:goldenstandard@gmail.com</p>
</nav>

</body>
</html>
