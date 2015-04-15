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
if (isset($_POST['new_subscriber'])) {
	$new_subscriber = $_POST['new_subscriber'];

 	$query = "INSERT INTO subscribers (email) VALUES ('$new_subscriber')";

	$result = mysqli_query($connection, $query);
	if ($result) {
		//header('Location: index.php');
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<script src="//use.typekit.net/cww7qmp.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<title>PART Oksbøl</title>
</head>

<body>
<div id="container"><!----------------- Facebook SDK------------------------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=345313962221747&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End of Facebook code-->
<!------------------------------------ PAGE HEADER------------------------------------------->
<header id="pageHeader">
  <?php require_once 'includes/header.php'; ?>
</header>
<!------------------------------------ PAGE CONTENT------------------------------------------->
<div id="mainContent">
	<article id="whyTakePart">
      <img class="blockImage" src="images/girl.jpg" alt="girl on hay" width="300" height="300" />
      <section class="blockContent">
        <h1>Thanks for subscribing for newsletter!</h1>
        <p>Oksbøl is a great place and we can make it even better together.</p>
        <a href="index.php" class="action-btn">Back to home page</a>
      </section>
    </article>
<!------------------------------------ PAGE FOOTER------------------------------------------->
<footer id="pageFooter">
 <?php include 'includes/footer.php' ; ?>
</footer></div>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>
