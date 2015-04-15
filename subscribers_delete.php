<?php
  //1. Create a database connection 
  require_once 'login/login.php';
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occured.
  if(mysqli_connect_errno()) {
	  die("Database connection failed: " .
	  	   mysqli_connect_error() .
		   " (" . mysqli_connect_errno() . ")"
		   );
	}

if (isset($_GET['subscriber_id']) && isset($_GET['subscriber_email'])) {
	$subscriber_id = $_GET["subscriber_id"];
	$subscriber_email = $_GET["subscriber_email"]; 
	
	 // 2. Perform database query
	 $query = "DELETE FROM subscribers ";
	 $query .= "WHERE id = $subscriber_id ";
	
	$result = mysqli_query($connection, $query);
	if ($result) {
		// 5. Close database connection
 		mysqli_close($connect);
		header('Location: admin.php');
	}
}
