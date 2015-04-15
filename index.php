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
if (isset($_POST['new_subscriber'])) {
	$new_subscriber = $_POST['new_subscriber'];

 	$query = "INSERT INTO subscribers (email) VALUES ('$new_subscriber')";

	$result = mysqli_query($connection, $query);
	if ($result) {
		header('Location: subscriptionSubmited.php');
	}
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="icon" type="image/png" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
    <script src="//use.typekit.net/cww7qmp.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="scripts/script.js" type="text/javascript"></script>
    <title>PART Oksbøl</title>
</head>

<body>
<div id="container">
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

	<article id="whyTakePart">
    
      <img class="blockImage" src="images/girl.jpg" alt="girl on hay"/>
      <section class="blockContent">
        <h1>Why to take PART?</h1>
        <h2>Town for you by you</h2>
        <p>Oksbøl is a great place and we can make it even better together. </p>
        <form id="newsLetterSubscription" method="post">
          <input type="text" id="email" name="new_subscriber" placeholder="Write your email...">
          <input type="submit" class="submit" value="Sign up">
        </form>
      </section>
   </article> 
   <article id="howTakePart">
   		<h1>How to take PART</h1>
        <h2>Different ways of participating</h2>
   			<section>
            	<ul id="howToList">
                   <li>
                   	<img src="images/participate.png" width="250" height="250" alt="pictuers for culture, nature, town life and sports" />
                    	<p>Pick your area: sports, culture, nature or town life</p>
                   </li>
                   <li>
                   	<img src="images/social_media.png" width="250" height="250" />
                    <p>Like projects or shareing on social media</p>
                   </li>
                   <li>
                   	<img src="images/idea.png" width="250" height="250" />
                      <p>Have an idea what the town is missing? Let us know</p>
                   </li>
                </ul>
             </section>
   </article>
   <article id="whatIsPart">
      <section>
   		<img src="images/logoWhite.svg" width="160" height="160" />
        <h1>What is PART?</h1>
        <h2>Be part of community</h2>
        <p>Oksbøl is a great place and we can make it even better together. Take part in how your town will look in future.</p>
       </section>
    </article>
   <article id="appPromo">
    	<h1>What's up? app</h1>
        <p>We've got a little game for you.</p>
        <p>Your boss went rollerblading in the church when firemen came and washed the floor with green tea</p>
        <p>Whant more? Make your own news and share it with friends</p>
        <a href="" class="action-btn">Get What's up? app</a>
    </article>

<!------------------------------------ PAGE FOOTER------------------------------------------->
<footer id="pageFooter">
    <?php include 'includes/footer.php' ; ?>
</footer>
</div><!--End of id="container"-->
</body>
</html>
<?php
 // 5. Close database connection
 mysqli_close($connection);
?>
