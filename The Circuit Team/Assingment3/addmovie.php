<?php
include 'database.php';

// Fetch the maximum MovieID from the database
$stmt = $db->query("SELECT MAX(MovieID) AS MaxMovieID FROM Movie");
$maxMovieID = $stmt->fetch(PDO::FETCH_ASSOC)['MaxMovieID'];
$newMovieID = $maxMovieID + 1;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an SQL statement to insert a new movie
    $stmt = $db->prepare("INSERT INTO Movie (MovieID, MovieTitle, ReleaseDate, Genre) VALUES (:MovieID, :MovieTitle, :ReleaseDate, :Genre)");
    
    // Bind parameters
    $stmt->bindParam(':MovieID', $newMovieID);
    $stmt->bindParam(':MovieTitle', $_POST['MovieTitle']);
    $stmt->bindParam(':ReleaseDate', $_POST['ReleaseDate']);
    $stmt->bindParam(':Genre', $_POST['Genre']);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to movie.php
        header("Location: index.php");
        exit();
    }
    else {
        echo "Error: Unable to add movie";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MSU Movie Center: Add Movie</title>

    <style>
      .heading-with-shadow
      {
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
      }
    </style>
</head>

<body>
    <div>
    <h1 class="text-center heading-with-shadow">MSU Movie Center</h1>
    <h3 class="text-center">Xavier Warner, Dhruv Rana, Harrison Lessner, and Damon Wich</h3>
    <h2>Add Movie</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- create form for add movie -->
            <div class="form-group col">
                <label for="MovieTitle" style="display: inline-block; width: 215px;">Movie Title:</label>
                <input type="text" id="MovieTitle" name="MovieTitle" class="form-control" placeholder="Movie Title" style="display: inline-block; width: 235px;" required>
            </div>

            <div class="form-group col">
                <label for="ReleaseDate" style="display: inline-block; width: 215px;">Release Date:</label>
                <input type="date" id="ReleaseDate" name="ReleaseDate" class="form-control" style="display: inline-block; width: 175px;" required>
            </div>

            <div class="form-group col">
                <label for="Genre" style="display: inline-block; width: 215px;">Genre:</label>
                
                
                
                <select id="Genre" name="Genre" class="form-control" style="display: inline-block; width: 235px;" required>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Crime">Crime</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Historical">Historical</option>
                    <option value="Horror">Horror</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Political">Political</option>
                    <option value="Romance">Romance</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Western">Western</option>
                </select>
            </div>
            

            <div class="col form-group">
                <input type="submit" value="Insert Movie" class="btn btn-primary">
            </div>

            <div class="col form-group"> 
                <a href="index.php">View Movie List</a>
            </div>
    </form>
    </div>
</body>

<footer>
  <h1 class="text-center heading-with-shadow">© 2024 MSU</h1>
</footer>

</html>