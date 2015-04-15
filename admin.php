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
 // 2. Perform database query
 $query = "SELECT * ";
 $query .= "FROM subscribers";
 $result = mysqli_query($connection, $query);
 // test if there is a query error
 if (!$result) {
	 die("Database querry failed");
	 }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="styles/style-admin.css" />
<title>PART Oksbøl admin</title>
</head>

<body>
<div id="container">
<header id="pageHeader">
  <a href="admin.php"><img id="logo" src="images/logo.svg" hight="120" width="120" alt="PART logo red" /></a>
  <h1 id="siteTitle">Admin</h1>
  <nav>
      <ul>
          <li><a href="admin.pgp">Subscribers</a></li>
          <li><a href="ideas.php">Ideas</a></li>
          <li><a href="manageAdmins.php">Manage admins</a></li>
       </ul>
  </nav>
</header>
<div class="container">
 <h1>Subscribers</h1>
 <table>
    <?php while($subscriber = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $subscriber["email"]; ?></td>
      <td><a href="subscriber_update.php?subscriber_id=<?php echo $subscriber["id"]; ?>&subscriber_email=<?php echo $subscriber["email"]; ?>" class="btn">Edit</a></td>
      <td><a href="subscriber_delete.php?subscriber_id=<?php echo $subscriber["id"]; ?>&subscriber_email=<?php echo $subscriber["email"]; ?>" class="btn">Delete</a></td>
    </tr>
    <?php 
    }
    ?>
   </table>

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
