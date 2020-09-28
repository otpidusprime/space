<!doctype html>
<?php require_once('connectvars.php'); ?>
<?php

if (!isset($_COOKIE['username']) || !isset($_GET["acc_id"]) && !isset($_GET["acc_type"]))
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

	<title>Performing Operation...</title>

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
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	$accnt_id = $_GET["acc_id"];
	$accnt_type = $_GET["acc_type"];

	echo '<p><b>DELETING YOUR '.$accnt_type.' ACCOUNT INFO</b><br>Please Wait....</p>';

	$query = "DELETE FROM accounts WHERE aid='$accnt_id'";
	mysqli_query($dbc, $query);
	mysqli_close($dbc);


    redirect('space.php');

?>

</div>


<script src="js/main.js"></script> <!-- Gem jQuery -->
<script type="text/javascript">
	$(".error").slideDown(3000).delay(3000).fadeOut();
</script>
</body>
</html>
