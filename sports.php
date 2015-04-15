<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<script src="//use.typekit.net/cww7qmp.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<title>PART Oksbøl: Sports</title>
</head>

<body>
<div id="container">
<!-- Facebook SDK-->
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
<article class="project-category">
<img src="images/menPlayFootbal.jpg" alt="men playing football" />
<h1>Sports</h1>
<p>You like to participate in sports? Here is something for you! Here you can read more about sports events and projects what we are planning.</p>
</article>
<article class="project">
<h1>Yearly football tournament</h1>
<p>Yearly football tournament knocking on door already! Come sign up and be a part of awesome tournament! </p>
</article>

<article class="project">
  <h1>Summer Games</h1>
  <p>It is a new project with what we try to establish yearly summer olympics. Read more and show us your support!</p>
</article>
<article class="project">
  <h1>Aquapark</h1>
  <p>Opened every day 08:00-19:00. Come swim and enjoy the water!!</p>
</article>
<footer id="pageFooter">
   <?php include 'includes/footer.php'; ?>
</footer>
</div>
</body>
</html>
