<?php
     $dbhost = "localhost";
     $dbuser = "oksbol";
     $dbpass = "aciupaciu_1";
     $dbname ="part_oksbol";;
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
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['idea'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$idea = $_POST['idea'];

 	$query = "INSERT INTO ideas (name, email, idea) VALUES ('$name','$email','$idea')";

	$result = mysqli_query($connection, $query);
	if ($result) {
		//header('Location: subscriptionSubmited.php');
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
<title>PART Oksbøl: What is PART?</title>
</head>

<body>
<!----------------- Facebook SDK------------------------->
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
	
    <article id="whatIsPart">
    <section>
        <h1>Thank you for your idea!</h1>
        <p>We've got it. </p>
        <a href="index.php" class="btn">Get back</a>
     
        <img src="images/logo.svg" width="160" height="160" />
        </section>
    </article>
	
</div>
<!------------------------------------ PAGE FOOTER------------------------------------------->
<footer id="pageFooter">
    <?php include 'includes/footer.php';?>
</footer>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>
