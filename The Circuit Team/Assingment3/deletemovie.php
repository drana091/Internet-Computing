<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <?php
    // Establish database connection
    include 'database.php';

    // Check if movie ID is provided and valid
    if (isset($_GET['MovieID']) && is_numeric($_GET['MovieID'])) {
    // Retrieve movie ID
      $movieID = $_GET['MovieID'];
    
    // Prepare DELETE query
      $stmt = $db->prepare("DELETE FROM Movie WHERE MovieID = :MovieID");
      $stmt->bindParam(':MovieID', $movieID);
    
    // Execute the statement
      if ($stmt->execute()) {
        // Redirect back to the movie list page after deletion
        header('Location: index.php');
        exit;
      } else {
        echo "Error: Unable to delete movie";
        }
      }
    else {
    echo "Error: Invalid movie ID";
    }
  ?>
</html>