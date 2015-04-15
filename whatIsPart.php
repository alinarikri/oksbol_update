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
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['idea'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$idea = $_POST['idea'];

 	$query = "INSERT INTO ideas (name, email, idea) VALUES ('$name','$email','$idea')";

	$result = mysqli_query($connection, $query);
	if ($result) {
		header('Location: ideaSubmited.php');
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
<div id="container"><header id="pageHeader">
  <?php require_once 'includes/header.php'; ?>
</header>
<!------------------------------------ PAGE CONTENT------------------------------------------->
    <article id="whatIsPart">
    	<img src="images/logo.svg" width="160" height="160" />
        <h1>What is PART?</h1>
        <h2>Be part of community - be part of Oksbøl</h2>
        <p>We created this project because we love our town and we want to make it better with your help.</p>
        <ul>
        	<li>be PART</li>
            <li>take PART</li>
            <li>PART </li>
            <li>be PART</li>
            <li>be PART</li>
        </ul>
    </article>
	<article class="project">
    	<section class="text">
        	<h1>Project for Oksbøl</h1>
            <p>With project PART we want to give an opportunity for all young people of Oksbøl to learn and participate in town development.</p>
            <h1>Differnt ways to participate</h1>
            <p>You can take PART in different ways. Firstly begin by learning what is happening, Oksbøl is your town.</p>
           </section>
    </article>
    <article id="sendIdeaForm">
        	<form id="sendIdea" action="" method="post">
            	<fieldset>
                    <legend>
                      <h2>Have an idea? </h2>
                    </legend>
                    <p>Do you think town is missing something? Or simply can be better? Send your idea</p>
                    <ol>
                      <li>
                          <label for="name">Your name:</label>
                          <input type="text" name="name" id="name">
                      </li>
                      <li>
                          <label for="email">E-mail:</label>
                          <input type="email" name="email" value="" id="email">
                      </li> 
                      <li>
                      	  <textarea id="idea" name="idea" cols="33" rows="8"  placeholder="My idea is ..."></textarea>
                      </li>
                      <li><input type="submit" class="submit" value="Send my idea">
                      </li>
                    </ol>
                </fieldset>
            </form>
        </article>
</div>
<!------------------------------------ PAGE CONTENT------------------------------------------->
<footer id="pageFooter">
    <?php include 'includes/footer.php';?>
</footer></div>
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>
