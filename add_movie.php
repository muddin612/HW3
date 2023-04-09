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
  <style>

h1{
    text-shadow: 4px 4px gray;
}


    </style>
</head>
<body>
<h1 class="text-center">MSU Movie Center</h1>
	<h2 style="text-align:center">Mohammed Uddin, Dennis  Wanis, Kervin Hyka</h2>
  <hr>
  <div class="container mt-4">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="title">Movie Title:</label>
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
      <button type="submit" class="btn btn-success">Add Movie</button>
      <a type="button" href="index.php" class="btn btn-dark" role="button">List All Movies</a>
    </form>
  </div>

</body>
<footer class="text-center  fixed-bottom">
<div class="container" style="font-size: 30px;">
	<span class="text-dark">MSU Movie Center &copy; 2023</span>
</div>
</footer>
</html>
