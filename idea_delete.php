<?php
  //1. Create a database connection 
  $dbhost = "localhost";
  $dbuser = "oksbol";
  $dbpass = "aciupaciu_1";
  $dbname ="part_oksbol";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occured.
  if(mysqli_connect_errno()) {
	  die("Database connection failed: " .
	  	   mysqli_connect_error() .
		   " (" . mysqli_connect_errno() . ")"
		   );
	}

if (isset($_GET['idea_id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['idea'])) {
	$idea_id = $_GET["idea_id"];
	$name = $_GET["name"];
	$email = $_GET["email"];
	$idea = $_GET["idea"]; 
	
	 // 2. Perform database query
	 $query = "DELETE FROM ideas ";
	 $query .= "WHERE id = $idea_id ";
	
	$result = mysqli_query($connection, $query);
	if ($result) {
		// 5. Close database connection
 		mysqli_close($connect);
		header('Location: ideas.php');
	}
}
