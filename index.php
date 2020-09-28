<!doctype html>
<?php require_once('connectvars.php'); ?>
<?php

if (isset($_COOKIE['username']))
{
    header('Location: space.php');  
    exit;
}

?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>SPACE</title>

</head>
<body>
	<header role="banner">
		<div id="cd-logo"><a href="index.php"><img src="img/logo-png.png" alt="Logo" width="150px" height="41px"></a></div>

		      <nav class="main-nav">
                <ul>
                 <li><a class="cd-signin" href="login.php">Login</a></li>
                 <li><a class="cd-signup" href="signup.php">Sign up</a></li>
                </ul>
		      </nav>
	</header>

	<div class="hero-container">
		<div class="hero-greet">WELCOME TO YOUR PERSONAL SPACE.</div>
	</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Gem jQuery -->
</body>
</html>
