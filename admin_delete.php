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

if (isset($_GET['administrators_id'])) {
	$administrators_id = $_GET["administrators_id"];
	
	
	 // 2. Perform database query
	 $query = "DELETE FROM administrators ";
	 $query .= "WHERE id = $administrators_id ";
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// 5. Close database connection
 		mysqli_close($connect);
		header('Location: manageAdmins.php');
		
	}
}
