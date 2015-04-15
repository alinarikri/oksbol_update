<?php

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
?>
<?php
$subscriber_id = $_GET["subscriber_id"];
$subscriber_email = $_GET["subscriber_email"]; 

if (isset($_POST['new_email']) && isset($_POST['id'])) {
	$new_email = $_POST['new_email'];
	$id = $_POST['id'];
	
 	$query = "UPDATE subscribers SET ";
	$query .= "email ='$new_email' ";
	$query .= "WHERE id = $id ";
	
	$result = mysqli_query($connection, $query);
	if ($result) {
		header('Location: admin.php');
	}
}
 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style-admin.css" />
<title>PART Oksbøl: edit subscriber</title>
</head>

<body>
<div id="container">
<header id="pageHeader">
  <a href="admin.php"><img id="logo" src="images/logo.svg" hight="120" width="120" alt="PART logo red" /></a>
  <h1 id="siteTitle">Admin</h1>
  <nav>
      <ul>
          <!--<li><a href="#">Pages</a></li>-->
          <li><a href="subscribers.php">Subscribers</a></li>
          <li><a href="">Ideas</a></li>
       </ul>
  </nav>
</header>
 	<p>Update <?php echo $subscriber_email; ?></p>
    <form method="post">
    	<input type="text" name="new_email" value="" placeholder="Type in new email"/>
        <input type="hidden" name="id" value="<?php echo $subscriber_id; ?>"/>
    	<input type="submit" value="Update" class="submit"/>
        <a href="admin.php" class="btn">Cancel</a>
    </form>
</div>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>