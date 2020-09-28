<!DOCTYPE html>
<?php require_once('connectvars.php'); ?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add Your Color | I♥COLORS</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/addcolor.css">
		<link rel="stylesheet" href="css/tip-twitter/tip-twitter.css" type="text/css" />

	<script src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.poshytip.js"></script>

	<script type="text/javascript">
		//<![CDATA[
		$(function(){

			$('#icon').poshytip({
				className: 'tip-twitter',
				showTimeout: 80,
				alignTo: 'target',
				alignX: 'center',
				offsetY: 10,
				allowTipHover: false,
				fade: false,
				slide: false
			});
			});
			//]]>
	</script>

	</head>
	<body>

<div class="card">
<div class="logo">I<div style="font-family:'Segoe UI'; font-size:1.125em; display:inline-block; color:#ed7161;">♥</div>COLORS</div>
  <h1>ADD YOUR COLOR</h1>
<?php
function redirect($location)
{
	echo "\n".'<script language="javascript">setTimeout(\'window.location.href="'.$location.'"\', 5000);</script>'."\n";
}

$display_form = true;
if(isset($_POST['submit']))
{
if(isset($_POST['name'])){ $name = $_POST['name']; }
if(isset($_POST['colorname'])){ $colorname = $_POST['colorname']; }
if(isset($_POST['hexval'])){ $hexval = $_POST['hexval']; }
if(isset($_POST['rgbval'])){ $rgbval = $_POST['rgbval']; }
if(isset($_POST['rgbaval'])){ $rgbaval = $_POST['rgbaval']; }
if(isset($_POST['date'])){ $date = $_POST['date']; }

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if ( !empty($name) && !empty($colorname) && !empty($hexval)  && !empty($rgbval)  && !empty($rgbaval) )
	{
		if (strpos($hexval, '#') === FALSE)
		{
			echo '<p class="error">Enter proper hex value with #.<br/>Eg. #2E2E2E or #2e2e2e.</p>'."\n";
		}
		else
		{
		$query = "SELECT * FROM accounts WHERE hex='$hexval'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0)
		{
			$query = "INSERT INTO colors (name, colorname, hex, rgb, rgba, colordate) VALUES "."('$name', '$colorname', '$hexval', '$rgbval', '$rgbaval', '$date')";
			mysqli_query($dbc, $query);
			$display_form = false;
			redirect('http://localhost/ilovecolors/index.php');
		}
		else
		{
			echo '<p class="error">Oops! That color already exists. Be creative, add another color.</p>'."\n";
		}
		}//inner if else
	}//else make it less
	else
	{
		echo '<p class="error">Enter all the data.<br/>All fields are mandatory.</p>'."\n";
	}
	mysqli_close($dbc);
}
?>
				<?php
				if($display_form)
				{
				?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="addcolor">
					  	<label>Name<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    					<input type="text" data-validate="required" name="name" value="Anonymous" />

    					<label>Color Name<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    					<input type="text" data-validate="required" name="colorname" value="A New Color" />

   						<label>HEX<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    					<input type="text" data-validate="required" name="hexval" id="hex" placeholder="Eg.  #2e2e2e or #2E2E2E"/>

   						<label>RGB<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    					<input type="text" data-validate="required" name="rgbval" id="rgb" placeholder="Automatically Generated"/>

   						<label>RGBA<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    					<input type="text" data-validate="required" name="rgbaval" id="rgba" placeholder="Automatically Generated"/>

    					<input type="hidden" data-validate="required" name="date" id="date" />

    					<!--<label>E-mail address</label>
    					<input type="email" name="email" data-validate="required email" placeholder="user@example.com" />

    					<label>Password</label>
    					<input type="password" data-validate="required" name="password" />-->

    					<input type="reset" name="reset" value="RESET" /><input type="submit" name="submit" value="ADD COLOR" />&nbsp;
					</form>
				<?php
				}
				else {
					echo '<center><p>Thanks for sharing &nbsp;<i class="fa fa-smile-o"></i><br/>Your color has been successfully added to our database.<br/>Redirecting you to home page.
					<br/><br/>If not redirected within 5 seconds, then <a href="http://localhost/ilovecolors/index.php">click here</a>.</p></center>'."\n";
				}
				?>

</div><!--end card-->

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
    	var $body = $('body');
    	var $icon = $('#icon');
    	var hex = $("#hex").val();
    		$body.css('background', hex);
    		$icon.css('color', hex);

    	var inverted = invertColor(hex);
    	$icon.css('background', inverted);
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

    <script type="text/javascript">
    	$(".error").show().delay(3000).fadeOut();
    </script>

<script type="text/javascript">
var hex;

function rgbify() {
  hex = $('#hex').val().replace('#','');

  var reg = hex.length === 3 ? hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2] : hex;
  var conv = reg.match(/.{2}/g);

  var r = parseInt(conv[0],16);
  var g = parseInt(conv[1],16);
  var b = parseInt(conv[2],16);

  var rgb = r+','+g+','+b;
  rgb = rgb.replace(/NaN/g,' ... ');

  $('#rgb').val('rgb('+rgb+')');
  $('#rgba').val('rgba('+rgb+',1)');
}

setInterval(rgbify,10);
</script>
<script src="js/classie.js"></script>

	</body>
</html>
