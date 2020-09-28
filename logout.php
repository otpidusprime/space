<!doctype html>
<?php require_once('connectvars.php'); ?>
<?php
if (!isset($_COOKIE['username']))
{
    header('Location: index.php');  
    exit;
}
?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>Logging Out...</title>

</head>
<body>
	<header role="banner">
	</header>

<div class="logout">
<?php
function redirect($location)
{
	echo "\n".'<script language="javascript">setTimeout(\'window.location.href="'.$location.'"\', 3000);</script>'."\n";
}
	setcookie('username','',time()-3600);
	echo '<p><b>LOGGING OUT...</b><br>Taking you to Login Page</p>';
    redirect('login.php');
?>
</div>


<script src="js/main.js"></script> <!-- Gem jQuery -->
<script type="text/javascript">
	$(".error").slideDown(3000).delay(3000).fadeOut();
</script>
</body>
</html>
