<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_movie"])) {

    // Get the form input values
    $movie_id = $_POST["movie_id"];
    $movie_title = $_POST["movie_title"];
    $release_date = $_POST["release_date"];
    $genre = $_POST["genre"];

    // Connect to the database
    $servername = "localhost";
    $username = "mgs_user";
    $password = "pa55word";
    $dbname = "MSU_Movies";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE Movie SET MovieTitle=?, ReleaseDate=?, Genre=? WHERE MovieID=?");
    $stmt->bind_param("sssi", $movie_title, $release_date, $genre, $movie_id);

    // Execute the statement and check for errors
    if ($stmt->execute() === FALSE) {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection and redirect to the index page
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit();
}

// Get the movie ID from the URL parameter
$movie_id = $_GET["id"];

// Connect to the database
$servername = "localhost";
$username = "mgs_user";
$password = "pa55word";
$dbname = "MSU_Movies";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to select the movie with the given ID
$stmt = $conn->prepare("SELECT * FROM Movie WHERE MovieID=?");
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the movie was found in the database
if ($result->num_rows == 0) {
    echo "Movie not found";
    exit();
}

// Get the movie data from the result set
$movie = $result->fetch_assoc();

// Close the database connection and the statement
$stmt->close();
$conn->close();
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
  <div class="container mt-4">
    <h2>Add a New Movie</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="movie_id" value="<?php echo $movie["MovieID"]; ?>">

    <div class="form-group">
    <label for="movie_title">Movie Title:</label>
    <input type="text" class="form-control" name="movie_title" value="<?php echo $movie["MovieTitle"]; ?>"><br>
    </div>

    <div class="form-group">
    <label for="release_date">Release Date:</label>
    <input type="date" class="form-control" name="release_date" value="<?php echo $movie["ReleaseDate"]; ?>"><br>
    </div>

    <div class="form-group">
    <label for="genre">Genre:</label>
    <input type="text" class="form-control" name="genre" value="<?php echo $movie["Genre"]; ?>"><br>
    </div>

    <input type="submit" class="btn btn-primary" name="update_movie" value="Update Movie">
    <a type="button" href="index.php" class="btn btn-dark" role="button">List All Movies</a>
</form>
  </div>

</body>
</html>