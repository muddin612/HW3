<!DOCTYPE html>
<html>
<head>
	<title>MSU Movie Center</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		footer{
			align-self: center;
		}
	</style>
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
<div class="container mt-5">
	<h1 class="text-center">MSU Movie Center</h1>
	<h3 class="text-center">Mohammed Uddin &amp Daniel Cwynar</h3>
	<div class="row mt-4">
		<div class="col-md-6">
			<h3>Movie List</h3>
		</div>
		<div class="col-md-6 text-right">
			<a href="add_movie.php" class="btn btn-primary">Add a New Movie</a>
		</div>
	</div>
	<div class="table-responsive">
	<table class="table mt-3 table-striped" style="width: 100%;" >
		<tr>
			<th>Movie Title</th>
			<th>Release Date</th>
			<th>Genre</th>
			<th>Update</th>
			<th>Remove</th>
		</tr>
		<?php
		// Connect to database
		$servername = "localhost";
		$username = "mgs_user";
		$password = "pa55word";
		$dbname = "MSU_Movies";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Retrieve all movies from database
		$sql = "SELECT * FROM Movie";
		$result = $conn->query($sql);

		// Display each movie in a table row
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["MovieTitle"] . "</td>";
				echo "<td>" . $row["ReleaseDate"] . "</td>";
				echo "<td>" . $row["Genre"] . "</td>";
				echo '<td><a href="edit.php?id=' . $row["MovieID"] . '">Edit</a></td>';
				echo "<td>";
        		echo '<form method="POST" action="delete.php">';
				echo '<input type="hidden" name="id" value="' . $row["MovieID"] . '">';
				echo '<button type="submit" name="delete" class="btn btn-danger">Delete</button>';
				echo '</form>';
				echo "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='5'>No movies found.</td></tr>";
		}

		// Close database connection
		$conn->close();
		?>
	</table>
	</div>
	
</body>
<footer><p>MSU Movie Center &copy; 2023</p></footer>
</html>
