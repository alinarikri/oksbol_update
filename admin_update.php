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
$administrators_id=$_GET['administrators_id'];
$administrators_fullName = $_GET['administrators_fullName'];

if (isset($_POST['new_fullName']) && isset($_POST['new_email'])) {
	$new_fullName = $_POST['new_fullName'];
	$new_email = $_POST['new_email'];
	$admin_id = $_POST['id'];
	
	
 	$query = "UPDATE administrators SET ";
	$query .= "fullName ='$new_fullName', ";
	$query .= "email ='$new_email' ";
	$query .= "WHERE id = '$admin_id' ";
	
	$result = mysqli_query($connection, $query);
	if ($result) {
		header('Location: manageAdmins.php');
		
	}
	
}
 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style-admin.css" />
<title>PART Oksbøl: edit Admin</title>
</head>

<body>
<div id="container">
<header id="pageHeader">
  <a href="admin.php"><img id="logo" src="images/logo.svg" hight="120" width="120" alt="PART logo red" /></a>
  <h1 id="siteTitle">Edit site admin</h1>
  <nav>
      <ul>
          <!--<li><a href="#">Pages</a></li>-->
          <li><a href="subscribers.php">Subscribers</a></li>
          <li><a href="ideas.php">Ideas</a></li>
          <li><a href="manageAdmins.php">Manage admins</a></li>
       </ul>
  </nav>
</header>
 	<p>Update <?php echo $administrators_fullName; ?></p>
    <ul>
	<form method="post">
    	<input type="text" name="new_fullName" value="" placeholder="New name for <?php echo $administrators_fullName ;?>"/>
    	<input type="text" name="new_email" value="" placeholder="Edit email"/>
        <input type="password" name="new_password" value="" placeholder="Change password"/>
        <input type="hidden" name="id" value="<?php echo $administrators_id; ?>"/>
    	<input type="submit" value="Update" class="submit"/>
        <a href="manageAdmins.php" class="btn">Cancel</a>
    </form>
    </ul>
</div>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>