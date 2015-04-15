<?php
	 require_once 'login/login.php';
	 require_once('includes/functions.php');
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
// Empty value that is available for the form
$user_name = ""; 


if (isset($_POST['user_name']) && isset($_POST['password'])) {
	
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	
 // Attempt login
 	$found_admin = attempt_login($user_name, $password);
	
	if ($found_admin) {
		// Success
		// Mark user as logged in
		redirect_to("admin.php");
		echo "Success";
	} else {
		// Failure
		$_SESSION["message"] = "Username/password not found";
	}
 
 }
 
 // test if there is a query error
 //if (!$result) {
//	 die("Database querry failed");
//	 }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style-admin.css" />
<title>PART Oksbøl | New admin</title>
</head>

<body>
<div id="container">
<header id="pageHeader">
  <a href="admin.php"><img id="logo" src="images/logo.svg" hight="120" width="120" alt="PART logo red" /></a>
 
  
</header>
<div class="container">
 <h1>Log in</h1>
<ul>
 	<form method="post">
    	<li><label for="user_name">User name: </label><input type="text" name="user_name" value="<?php echo htmlentities($user_name) ?>" placeholder="Create admin user name" required/></li>
        <li><label for="password">Password: </label><input type="password" name="password" value="" placeholder="Type in password" required/></li>
        
    	<input type="submit" name="submit" value="submit" class="submit"/>
       
    </form>

</ul>
 <?php
  // 4. Release returned data
  mysqli_free_result($result);
?>
</div>
</div>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>
