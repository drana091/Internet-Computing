<?php
    include 'database.php';

    // Get all movies
    $queryProducts = 'SELECT * FROM movie';
    $statement = $db->prepare($queryProducts);
    $statement->execute();
    $movies = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>MSU Movie Center: Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
      .heading-with-shadow
      {
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
      }
    </style>
</head>
<body>
<div class="container-fluid">
    
    <h1 class="text-center heading-with-shadow">MSU Movie Center</h1>
    <h3 class="text-center">Xavier Warner, Dhruv Rana, Harrison Lessner, and Damon Wich</h3>
   

    <a href="addmovie.php"><h3>Add A New Movie</h3></a>
    <h3>All Movies</h3>
    <section>
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Update</th>
                <th>Remove</th>
            </tr>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?php echo $movie['MovieTitle']; ?></td>
                    <td><?php echo $movie['ReleaseDate']; ?></td>
                    <td><?php echo $movie['Genre']; ?></td>
                    <td><button value="submit" onclick="window.location.href='editmovie.php?MovieID=<?php echo $movie['MovieID']; ?>'">EDIT</button></td>
                    <td><button value="submit" onclick="window.location.href='deletemovie.php?MovieID=<?php echo $movie['MovieID']; ?>'">DELETE</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</div>
<footer>
  <h1 class="text-center heading-with-shadow">© 2024 MSU</h1>
</footer>
</body>
</html>
