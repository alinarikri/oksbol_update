<?php
	 require_once 'login/login.php';
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
if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['fullName']) && isset($_POST['email'])) {
	
	$user_name = $_POST['user_name'];
	$hashed_password = crypt($_POST['password']);
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	
 // 2. Perform database query
 $query = "INSERT INTO administrators (user_name, password, fullName, email) ";
 $query .= "VALUES ('$userName','$hashed_password', '$fullName', '$email')";
 $result = mysqli_query($connection, $query);
 if ($result) {
	header('Location: manageAdmins.php');
 }
 
 // test if there is a query error
 if (!$result) {
	 die("Database querry failed");
	 }
}
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
  <h1 id="siteTitle">Manage admins</h1>
  <nav>
      <ul>
          <li><a href="admin.pgp">Subscribers</a></li>
          <li><a href="ideas.php">Ideas</a></li>
          <li><a href="manageAdmins.php">Manage admins</a></li>
       </ul>
  </nav>
</header>
<div class="container">
 <h1>Create new administrator</h1>
<ul>
 	<form method="post">
    	<li><label for="user_name">User name: </label><input type="text" name="user_name" value="" placeholder="Create admin user name" required/></li>
        <li><label for="password">Password: </label><input type="password" name="password" value="" placeholder="Type in password" required/></li>
        <li><label for="fullName">First and last name</label><input type="text" name="fullName" value="" placeholder="First and last names" required/></li>
        <li><label for="email">Email: </label><input type="email" name="email" value="" placeholder="User email" required/></li>
    	<input type="submit" value="Create" class="submit"/>
        <a href="manageAdmins.php" class="btn">Cancel</a>
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
