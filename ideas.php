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
 $query = "SELECT * ";
 $query .= "FROM ideas";
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
<link rel="stylesheet" type="text/css" href="styles/style-admin.css" />
<title>PART Oksbøl admin:idea</title>
</head>

<body>
<div id="container">
<header id="pageHeader">
  <a href="admin.php"><img id="logo" src="images/logo.svg" hight="120" width="120" alt="PART logo red" /></a>
  <h1 id="siteTitle">Admin</h1>
  <nav>
      <ul>
          <!--<li><a href="admin.php">Pages</a></li>-->
          <li><a href="admin.php">Subscribers list</a></li>
          <li><a href="ideas.php">Submited ideas</a></li>
          <li><a href="manageAdmins.php">Manage admins</a></li>
       </ul>
  </nav>
</header>
<div>
<h1>Submited ideas</h1>
 <table>
  <?php while($idea = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?php echo $idea["name"]; ?></td>
    <td><?php echo $idea["email"]; ?></td>
    <td><?php echo $idea["idea"]; ?></td>
    <td><?php echo $idea["date_submited"]; ?></td>
    <td><a href="idea_delete.php?idea_id=<?php echo $idea["id"]; ?>&name=<?php echo $idea["name"]; ?>&email=<?php echo $idea["email"]; ?>&idea=<?php echo $idea["idea"]; ?>" class="btn">Delete</a></td> 
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
