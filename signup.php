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
	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>SPACE | SIGNUP</title>

</head>
<body>
	<header role="banner">
	</header>

			<?php
			function redirect($location)
			{
				echo "\n".'<script language="javascript">setTimeout(\'window.location.href="'.$location.'"\', 5000);</script>'."\n";
			}
            
			$display_form = true;
			if(isset($_POST['submit']))
			{
			if(isset($_POST['username'])){ $username = $_POST['username']; }
			if(isset($_POST['email'])){ $email = $_POST['email']; }
			if(isset($_POST['password'])){ $password = $_POST['password']; }

				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if ( !empty($username) && !empty($password) )
				{
					$query = "SELECT * FROM users WHERE username='$username'";
					$data = mysqli_query($dbc, $query);
					if(mysqli_num_rows($data) == 0)
					{
						$query = "INSERT INTO users (username, email, password) VALUES "."('$username', '$email', '$password')";
						mysqli_query($dbc, $query);
						$display_form = false;
						redirect('login.php');
					}
					else
					{
						echo '<p class="error">Seems like you are already registered<br/>Please Login instead of Signing Up</p>'."\n";
					}
				}//else make it less
				else
				{
					echo '<p class="error">Enter all data<br/>All fields are mandatory</p>'."\n";
				}
				mysqli_close($dbc);
			}
			?>

					<div class="cd-form big">
					<?php
					if($display_form)
					{
					?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="signup" id="signupform">
						<p class="fieldset">
							<div class="form-logo"><a href="index.php" style="border: 0;outline:none;"><img src="img/logo-png-small.png"></a></div>
							<div class="subtext">SIGNUP</div>
						</p><div style="display=block;height:5px;"> </div>

							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-username">Username</label>
								<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" name="username" autofocus>
							</p>

							<p class="fieldset">
									<label class="image-replace cd-email" for="signup-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signup-password">Password</label>
								<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password" name="password" autocomplete="off">
								<a href="#0" class="hide-password" style="border-bottom: 0;outline:none;">Show</a>
							</p>

				            <input type="submit" name="submit" value="Create account" class="full-width has-padding" id="submit" onclick="return checkform()">

							<p class="fieldset">
								<center><label for="accept-terms">ALREADY REGISTERED? <a href="login.php">LOGIN HERE</a></label></center>
							</p>
						</form>
					<?php
					}
					else {
						echo '<center><p>You are now registered.<br/>Your account has been successfully created.<br/>Redirecting you to login page.
								<br/><br/>If not redirected within 5 seconds,<br/>then <a href="http://localhost/projectx/login.php">click here</a>.</p></center>'."\n";
					}
					?>
				    </div>


<script src="js/main.js"></script> <!-- Gem jQuery -->
<script type="text/javascript">
	$(".error").slideDown(3000).delay(3000).fadeOut();
</script>
</body>
</html>
