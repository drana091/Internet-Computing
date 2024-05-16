<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MSU Movie Center: Edit Movie</title>

    <style>
      .heading-with-shadow
      {
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
      }
    </style>
</head>

<?php
include 'database.php';

// Check if a movie ID is provided
if (isset($_GET['MovieID']) && is_numeric($_GET['MovieID'])) {
    $movieID = $_GET['MovieID'];
    
    // Retrieve movie details based on the movie ID
    $stmt = $db->prepare("SELECT * FROM Movie WHERE MovieID = :MovieID");
    $stmt->bindParam(':MovieID', $movieID);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$movie) {
        echo "Movie not found";
        exit;
    }
} else {
    echo "Movie ID not provided";
    exit;
}

// Define genre options
$genreOptions = [
    "Action", "Adventure", "Comedy", "Crime", "Drama", "Fantasy", "Historical", "Horror", "Mystery", "Political",
    "Romance", "Science Fiction", "Thriller", "Western"
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $MovieTitle = $_POST['MovieTitle'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $Genre = $_POST['Genre'];

    // Prepare and execute the UPDATE query
    $stmt = $db->prepare("UPDATE Movie SET MovieTitle = :MovieTitle, ReleaseDate = :ReleaseDate, Genre = :Genre WHERE MovieID = :MovieID");
    $stmt->bindParam(':MovieID', $movieID);
    $stmt->bindParam(':MovieTitle', $MovieTitle);
    $stmt->bindParam(':ReleaseDate', $ReleaseDate);
    $stmt->bindParam(':Genre', $Genre);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: Unable to update movie";
        exit;
    }
}
?>

<body>
    <!-- heading for page -->
    <h1 class="text-center heading-with-shadow">MSU Movie Center</h1>
    <h3 class="text-center">Xavier Warner, Dhruv Rana, Harrison Lessner, and Damon Wich</h3>
    <h2>Update Movie</h2>
    <p>Movie with ID: <?php echo $movieID; ?></p>
    
    <!-- edit movie form -->
    <form method="POST">
        <div class="form-group col">
        <label for="MovieTitle" style="display: inline-block; width: 140px;">Movie Title:</label>
        <input type="text" class="form-control" id="MovieTitle" name="MovieTitle" value="<?php echo $movie['MovieTitle']; ?>" style="display: inline-block; width: 235px;" required>
        </div>
        
        <div class="form-group col">
        <label for="ReleaseDate" style="display: inline-block; width: 140px;">Release Date:</label>
        <input type="date" class="form-control" id="ReleaseDate" name="ReleaseDate" value="<?php echo $movie['ReleaseDate']; ?>" style="display: inline-block; width: 175px;" required>
        </div>

        <div class="form-group col">
        <label for="Genre" style="display: inline-block; width: 140px;">Genre:</label>
        <select id="Genre" class="form-control" name="Genre" style="display: inline-block; width: 235px;" required>
            <?php foreach ($genreOptions as $genre) : ?>
                <option value="<?php echo $genre; ?>" <?php if ($genre === $movie['Genre']) echo 'selected'; ?>><?php echo $genre; ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        
        <div class="col form-group">
        <input type="submit" value="Update Movie" class="btn btn-primary">
        </div>

        <div class="col form-group"> 
            <a href="index.php">View Movie List</a>
        </div>
    </form>
</body>

<footer>
  <h1 class="text-center heading-with-shadow">© 2024 MSU</h1>
</footer>

</html>

