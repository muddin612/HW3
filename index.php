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

h1{
    text-shadow: 4px 4px gray;
}


    </style>
</head>
<body style="margin: 50px;">
<div class="container mt-5">
	<h1 class="text-center">MSU Movie Center</h1>
	<h2 style="text-align:center">Mohammed Uddin, Dennis  Wanis, Kervin Hyka</h2>
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
<footer class="text-center  fixed-bottom">
<div class="container" style="font-size: 30px;">
	<span class="text-dark">MSU Movie Center &copy; 2023</span>
</div>
</footer>
</html>
