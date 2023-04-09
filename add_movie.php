<!DOCTYPE html>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "mgs_user", "pa55word", "MSU_Movies");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the movie title, release date, and genre from the form
  $title = $_POST["title"];
  $release_date = $_POST["release_date"];
  $genre = $_POST["genre"];

  // Insert the new movie into the database
  $query = "INSERT INTO Movie (MovieTitle, ReleaseDate, Genre) VALUES ('$title', '$release_date', '$genre')";
  mysqli_query($conn, $query);

 // Redirect back to the index.php page
 header("Location: index.php");
 exit();
}

// Close the database connection
mysqli_close($conn);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MSU Movie Center</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">MSU Movie Center</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Add a New Movie</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" type="text" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="release_date">Release Date:</label>
        <input type="date" class="form-control" id="release_date" name="release_date" required>
      </div>
      <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
  </div>

</body>
</html>
