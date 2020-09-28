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

	<title>SPACE | ADD ACCOUNT</title>

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
			if(isset($_POST['acctype'])){ $acctype = $_POST['acctype']; }
			if(isset($_POST['accname'])){ $accname = $_POST['accname']; }
			if(isset($_POST['accpassword'])){ $accpassword = $_POST['accpassword']; }
			if(isset($_POST['dateadded'])){ $dateadded = $_POST['dateadded']; }
			if(isset($_POST['username'])){ $username = $_POST['username']; }

				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if ( !empty($acctype) && !empty($accname) && !empty($accpassword) && !empty($dateadded) && !empty($username))
				{
					$query = "SELECT * FROM accounts WHERE acctype='$acctype'";
					$data = mysqli_query($dbc, $query);

					$query = "INSERT INTO accounts (acctype, accname, accpassword, dateadded, username) VALUES "."('$acctype', '$accname', '$accpassword', '$dateadded', '$username')";
					mysqli_query($dbc, $query);
					$display_form = false;
					redirect('space.php');

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
							<div class="form-logo shiftL"><a href="space.php" style="border: 0;outline:none;"><img src="img/logo-png-small.png"></a></div>
							<div class="subtext">ADD NEW</div>
						</p><div style="display=block;height:5px;"> </div>

							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-username">Platform Name</label>
								<input class="full-width has-padding has-border" id="account" type="text" placeholder="Account (eg. Facebook/Twitter)" name="acctype" autofocus>
							</p>

							<p class="fieldset">
									<label class="image-replace cd-email" for="signup-email">Username/Email</label>
									<input class="full-width has-padding has-border" id="signup-email" type="text" placeholder="Username/Email" name="accname">
									<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signup-password">Password</label>
								<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Account Password" name="accpassword" autocomplete="off">
								<a href="#0" class="hide-password" style="border-bottom: 0;outline:none;">Show</a>
							</p>

							<input type="hidden" name="dateadded" id="date" />
							<input type="hidden" name="username" id="username" value="<?php echo ''.$_COOKIE['username'].''; ?>" />

				            <input type="submit" name="submit" value="Add This Account" class="full-width has-padding" id="submit" onclick="return checkform()">

							<p class="fieldset">
								<center><label for="accept-terms"><div style="text-transform:uppercase;font-weight:800;margin-bottom:-15px;margin-top:-5px;">Hi <?php echo ''.$_COOKIE['username'].''; ?>!</div><br/>Enter all field values and click "Add This Account"</label></center>
							</p>
						</form>
					<?php
					}
					else {
						echo '<center><p><div style="font-weight:800;">SWEEET!</div><br/>The account has been added successfully.<br/>Redirecting you to your space.
								<br/><br/>If not redirected within 5 seconds,<br/>then <a href="http://localhost/space/space.php">click here</a>.</p></center>'."\n";
					}
					?>
				    </div>

<script src="js/main.js"></script> <!-- Gem jQuery -->

<script type="text/javascript">
	$(".error").slideDown(3000).delay(3000).fadeOut();
</script>

	<script type="text/javascript">
        	var today = new Date();
        	var dd = today.getDate();
        	var mm = today.getMonth()+1;

        	var yyyy = today.getFullYear();
        	if(dd<10){
        	    dd='0'+dd;
        	}
        	if(mm<10){
        	    mm='0'+mm;
        	}
        	var today = dd+'/'+mm+'/'+yyyy;
        	document.getElementById('date').value = today;
    </script>

<script type="text/javascript">
    function bgcolor() {
    	var hex = $('#account').val();
    	hex=hex.toUpperCase();

    	var $body = $('body');
    	var $header = $('header');

    	if (hex=='FACEBOOK') {
    		$body.css('background', '#3b5998');
    		$header.css('background', '#3b5998');
    	}
    	else if (hex=='TWITTER') {
    		$body.css('background', '#55acee');
    		$header.css('background', '#55acee');
    	}
    	else if (hex=='GOOGLE') {
    		$body.css('background', '#4285f4');
    		$header.css('background', '#4285f4');
    	}
    	else if (hex=='INSTAGRAM') {
    		$body.css('background', '#675144');
    		$header.css('background', '#675144');
    	}
    	else if (hex=='YAHOO' || hex=='YAHOO!') {
    		$body.css('background', '#400191');
    		$header.css('background', '#400191');
    	}
    	else if (hex=='ADOBE' || hex=='ADOBE CC' || hex=='CC' || hex=='CREATIVE CLOUD' || hex=='ADOBE CREATIVE CLOUD') {
    		$body.css('background', '#d73636');
    		$header.css('background', '#d73636');
    	}
    	else if (hex=='AIM') {
    		$body.css('background', '#ffd900');
    		$header.css('background', '#ffd900');
    	}
    	else if (hex=='AIRBNB') {
    		$body.css('background', '#fd5c63');
    		$header.css('background', '#fd5c63');
    	}
    	else if (hex=='AMAZON' || hex=='AMAZON.COM' || hex=='AMAZON.IN') {
    		$body.css('background', '#ff9900');
    		$header.css('background', '#ff9900');
    	}
    	else if (hex=='BAIDU') {
    		$body.css('background', '#d42f36');
    		$header.css('background', '#d42f36');
    	}
    	else if (hex=='BANDCAMP') {
    		$body.css('background', '#629aa9');
    		$header.css('background', '#629aa9');
    	}
    	else if (hex=='BEBO') {
    		$body.css('background', '#e04646');
    		$header.css('background', '#e04646');
    	}
    	else if (hex=='BEHANCE') {
    		$body.css('background', '#1769ff');
    		$header.css('background', '#1769ff');
    	}
    	else if (hex=='BING') {
    		$body.css('background', '#ffb900');
    		$header.css('background', '#ffb900');
    	}
    	else if (hex=='BITLY' || hex=='BIT.LY') {
    		$body.css('background', '#ee6123');
    		$header.css('background', '#ee6123');
    	}
    	else if (hex=='BLOGGER' || hex=='BLOGSPOT') {
    		$body.css('background', '#f57d00');
    		$header.css('background', '#f57d00');
    	}
    	else if (hex=='DELICIOUS') {
    		$body.css('background', '#3399ff');
    		$header.css('background', '#3399ff');
    	}
    	else if (hex=='DEVIANTART' || hex=='DEVIANT ART') {
    		$body.css('background', '#4dc47d');
    		$header.css('background', '#4dc47d');
    	}
    	else if (hex=='DIGG') {
    		$body.css('background', '#2e2e2e');
    		$header.css('background', '#2e2e2e');
    	}
    	else if (hex=='DISQUS') {
    		$body.css('background', '#2e9fff');
    		$header.css('background', '#2e9fff');
    	}
    	else if (hex=='DOMINOS' || hex=="DOMINO'S" || hex=="DOMINO'S PIZZA"  || hex=='DOMINOS PIZZA') {
    		$body.css('background', '#0b648f');
    		$header.css('background', '#0b648f');
    	}
    	else if (hex=='DRIBBBLE' || hex=='DRIBBLE') {
    		$body.css('background', '#ea4c89');
    		$header.css('background', '#ea4c89');
    	}
    	else if (hex=='DROPBOX') {
    		$body.css('background', '#007ee5');
    		$header.css('background', '#007ee5');
    	}
    	else if (hex=='DRUPAL') {
    		$body.css('background', '#0077c0');
    		$header.css('background', '#0077c0');
    	}
    	else if (hex=='EBAY') {
    		$body.css('background', '#86b817');
    		$header.css('background', '#86b817');
    	}
    	else if (hex=='ELLO') {
    		$body.css('background', '#2e2e2e');
    		$header.css('background', '#2e2e2e');
    	}
    	else if (hex=='ENVATO' || hex=='ENVATO MARKETPLACE') {
    		$body.css('background', '#82b541');
    		$header.css('background', '#82b541');
    	}
    	else if (hex=='EVERNOTE') {
    		$body.css('background', '#7ac142');
    		$header.css('background', '#7ac142');
    	}
    	else if (hex=='FEEDLY') {
    		$body.css('background', '#2bb24c');
    		$header.css('background', '#2bb24c');
    	}
    	else if (hex=='FEDEX') {
    		$body.css('background', '#660099');
    		$header.css('background', '#660099');
    	}
    	else if (hex=='FLICKR') {
    		$body.css('background', '#ff0084');
    		$header.css('background', '#ff0084');
    	}
    	else if (hex=='FOURSQUARE') {
    		$body.css('background', '#f94877');
    		$header.css('background', '#f94877');
    	}
    	else if (hex=='GITHUB') {
    		$body.css('background', '#999999');
    		$header.css('background', '#999999');
    	}
    	else if (hex=='GODADDY' || hex=='GO DADDY') {
    		$body.css('background', '#7db701');
    		$header.css('background', '#7db701');
    	}
    	else if (hex=='GOOGLE+' || hex=='GOOGLE PLUS') {
    		$body.css('background', '#dd4b39');
    		$header.css('background', '#dd4b39');
    	}
    	else if (hex=='HEROKU') {
    		$body.css('background', '#6762a6');
    		$header.css('background', '#6762a6');
    	}
    	else if (hex=='HULU') {
    		$body.css('background', '#a5cd39');
    		$header.css('background', '#a5cd39');
    	}
    	else if (hex=='IBM') {
    		$body.css('background', '#006699');
    		$header.css('background', '#006699');
    	}
    	else if (hex=='IFTTT') {
    		$body.css('background', '#3fc2ee');
    		$header.css('background', '#3fc2ee');
    	}
    	else if (hex=='IMDB') {
    		$body.css('background', '#e7ca57');
    		$header.css('background', '#e7ca57');
    	}
    	else if (hex=='IMGUR') {
    		$body.css('background', '#85bf25');
    		$header.css('background', '#85bf25');
    	}
    	else if (hex=='INTEL') {
    		$body.css('background', '#0f7dc2');
    		$header.css('background', '#0f7dc2');
    	}
    	else if (hex=='JQUERY') {
    		$body.css('background', '#0769ad');
    		$header.css('background', '#0769ad');
    	}
    	else if (hex=='KHAN ACADEMY') {
    		$body.css('background', '#242f3a');
    		$header.css('background', '#242f3a');
    	}
    	else if (hex=='KICKSTARTER') {
    		$body.css('background', '#40d57c');
    		$header.css('background', '#40d57c');
    	}
    	else if (hex=='KIPPT') {
    		$body.css('background', '#d22922');
    		$header.css('background', '#d22922');
    	}
    	else if (hex=='LASTFM' || hex=='LAST FM') {
    		$body.css('background', '#cb2c25');
    		$header.css('background', '#cb2c25');
    	}
    	else if (hex=='LINKEDIN' || hex=='LINKED IN') {
    		$body.css('background', '#0077b5');
    		$header.css('background', '#0077b5');
    	}
    	else if (hex=='MAILCHIMP') {
    		$body.css('background', '#449a88');
    		$header.css('background', '#449a88');
    	}
    	else if (hex=='MICROSOFT') {
    		$body.css('background', '#f65314');
    		$header.css('background', '#f65314');
    	}
    	else if (hex=='MICROSOFT OFFICE' || hex=='OFFICE') {
    		$body.css('background', '#ea3e23');
    		$header.css('background', '#ea3e23');
    	}
    	else if (hex=='MYSPACE' || hex=='MY SPACE') {
    		$body.css('background', '#2e2e2e');
    		$header.css('background', '#2e2e2e');
    	}
    	else if (hex=='NETFLIX') {
    		$body.css('background', '#df222c');
    		$header.css('background', '#df222c');
    	}
    	else if (hex=='NVIDIA') {
    		$body.css('background', '#76b900');
    		$header.css('background', '#76b900');
    	}
    	else if (hex=='OPERA') {
    		$body.css('background', '#c52026');
    		$header.css('background', '#c52026');
    	}
    	else if (hex=='MOZILLA' || hex=='FIREFOX' || hex=='MOZILLA FIREFOX') {
    		$body.css('background', '#e66000');
    		$header.css('background', '#e66000');
    	}
    	else if (hex=='ORACLE' || hex=='ORACLE JAVA' || hex=='SUN' || hex=='JAVA') {
    		$body.css('background', '#d73636');
    		$header.css('background', '#d73636');
    	}
    	else if (hex=='PAYPAL' || hex=='PAY PAL') {
    		$body.css('background', '#009cde');
    		$header.css('background', '#009cde');
    	}
    	else if (hex=='PHOTOBUCKET') {
    		$body.css('background', '#0ea0db');
    		$header.css('background', '#0ea0db');
    	}
    	else if (hex=='PINTEREST') {
    		$body.css('background', '#cc2127');
    		$header.css('background', '#cc2127');
    	}
    	else if (hex=='PIZZAHUT' || hex=='PIZZA HUT') {
    		$body.css('background', '#ee3124');
    		$header.css('background', '#ee3124');
    	}
    	else if (hex=='PLAYSTATION') {
    		$body.css('background', '#003087');
    		$header.css('background', '#003087');
    	}
    	else if (hex=='POCKET') {
    		$body.css('background', '#d3505a');
    		$header.css('background', '#d3505a');
    	}
    	else if (hex=='PREZI') {
    		$body.css('background', '#318bff');
    		$header.css('background', '#318bff');
    	}
    	else if (hex=='QUORA') {
    		$body.css('background', '#a82400');
    		$header.css('background', '#a82400');
    	}
    	else if (hex=='REDDIT') {
    		$body.css('background', '#f36029');
    		$header.css('background', '#f36029');
    	}
    	else if (hex=='RSS') {
    		$body.css('background', '#f26522');
    		$header.css('background', '#f26522');
    	}
    	else if (hex=='SCRIBD') {
    		$body.css('background', '#1a7bba');
    		$header.css('background', '#1a7bba');
    	}
    	else if (hex=='SLACK') {
    		$body.css('background', '#6ecadc');
    		$header.css('background', '#6ecadc');
    	}
    	else if (hex=='SPOTIFY') {
    		$body.css('background', '#2ebd59');
    		$header.css('background', '#2ebd59');
    	}
    	else if (hex=='SQUARESPACE' || hex=='SQUARE SPACE') {
    		$body.css('background', '#2E2E2E');
    		$header.css('background', '#2E2E2E');
    	}
    	else if (hex=='STACK OVERFLOW' || hex=='STACKOVERFLOW') {
    		$body.css('background', '#f28531');
    		$header.css('background', '#f28531');
    	}
    	else if (hex=='STRIPE') {
    		$body.css('background', '#00afe1');
    		$header.css('background', '#00afe1');
    	}
    	else if (hex=='STUMBLEUPON') {
    		$body.css('background', '#eb4924');
    		$header.css('background', '#eb4924');
    	}
    	else if (hex=='TED') {
    		$body.css('background', '#e62b1e');
    		$header.css('background', '#e62b1e');
    	}
    	else if (hex=='TESLA' || hex=='TESLA MOTORS') {
    		$body.css('background', '#cc1f1f');
    		$header.css('background', '#cc1f1f');
    	}
    	else if (hex=='TREEHOUSE') {
    		$body.css('background', '#6fbc6d');
    		$header.css('background', '#6fbc6d');
    	}
    	else if (hex=='TRELLO') {
    		$body.css('background', '#0079bf');
    		$header.css('background', '#0079bf');
    	}
    	else if (hex=='TRIPADVISOR') {
    		$body.css('background', '#589442');
    		$header.css('background', '#589442');
    	}
    	else if (hex=='TUMBLR') {
    		$body.css('background', '#35465c');
    		$header.css('background', '#35465c');
    	}
    	else if (hex=='TWITCH' || hex=='TWITCH.TV' || hex=='TWITCH TV') {
    		$body.css('background', '#6441a5');
    		$header.css('background', '#6441a5');
    	}
    	else if (hex=='VIMEO') {
    		$body.css('background', '#1ab7ea');
    		$header.css('background', '#1ab7ea');
    	}
    	else if (hex=='VINE') {
    		$body.css('background', '#00b488');
    		$header.css('background', '#00b488');
    	}
    	else if (hex=='WORDPRESS' || hex=='WORDPRESS.COM') {
    		$body.css('background', '#0087be');
    		$header.css('background', '#0087be');
    	}
    	else if (hex=='WUFOO') {
    		$body.css('background', '#e66760');
    		$header.css('background', '#e66760');
    	}
    	else if (hex=='XBOX') {
    		$body.css('background', '#52b043');
    		$header.css('background', '#52b043');
    	}
    	else if (hex=='YANDEX') {
    		$body.css('background', '#edc832');
    		$header.css('background', '#edc832');
    	}
    	else if (hex=='YELP') {
    		$body.css('background', '#af0606');
    		$header.css('background', '#af0606');
    	}
    	else if (hex=='YOUTUBE') {
    		$body.css('background', '#cd201f');
    		$header.css('background', '#cd201f');
    	}
    	else {
    		$body.css('background', '#9b7cab');
    		$header.css('background', '#9b7cab');
    	}
    }
    setInterval(bgcolor,10);

    function invertColor(hexTripletColor) {
    var color = hexTripletColor;
    color = color.substring(1);           // remove #
    color = parseInt(color, 16);          // convert to integer
    color = 0xFFFFFF ^ color;             // invert three bytes
    color = color.toString(16);           // convert to hex
    color = ("000000" + color).slice(-6); // pad with leading zeros
    color = "#" + color;                  // prepend #
    return color;
	}
 </script>

</body>
</html>
