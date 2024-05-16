<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        /* Style the navigation bar */
        .navbar
        {
            background: #c3c3c3;
            color: black;
            border-bottom: 2px solid white;
        }
        .nav-link 
        {
            border-bottom: 2px solid black;
            border-right: 2px solid black;
            border-top: 2px solid white;
            border-left: 2px solid white;
            text-align: center;
            line-height: 20px;
            background: #c3c3c3;
            padding: 3px;
            margin-right: 5px;
            color: black;
        }
        .navbar-toggler-icon 
        {
            background-color: rgba(255, 255, 255, 1); /* Set hamburger icon color with full opacity */
        }

        .btn 
        {
            border-bottom: 3px solid black;
            border-right: 3px solid black;
            border-top: 3px solid white;
            border-left: 3px solid white;
            width: 190px;
            height: 35px;
            text-align: center;
            line-height: 20px;
        }
        
    </style>
    <link rel="stylesheet" href="projectstyle.css">
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
                    <a class="nav-link" href="home.php" onclick="clearCartAndRedirect('home.php')">Home</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="float: right;" onclick="clearCartAndRedirect('logout.php')">Log Out</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="cart.php" onclick="clearCartAndRedirect('cart.php')">Cart</a>
                </li>
            </ul>
            
        </div>
</nav>
<script>
function clearCartAndRedirect(url) {
    // Send AJAX request to clear the cart
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {            
            
            // Redirect the user to the specified URL after clearing the cart
            window.location.href = url;
        }
    };
    xhttp.open("GET", "clear_cart.php", true);
    xhttp.send();
}
</script>

</body>
</html>
