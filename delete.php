<?php
// Connect to the database
$conn = mysqli_connect("localhost", "mgs_user", "pa55word", "MSU_Movies");

// Check if the delete button has been clicked
if (isset($_POST['delete'])) {
  // Get the movie ID from the form
  $id = $_POST['id'];

  // Delete the movie from the database
  $query = "DELETE FROM Movie WHERE MovieID = '$id'";
  mysqli_query($conn, $query);

  // Redirect back to the index.php page
  header("Location: index.php");
  exit();
}

// Close the database connection
mysqli_close($conn);
?>
