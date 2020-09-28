<!DOCTYPE html>
<?php require_once('connectvars.php'); ?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Contact Us | I♥COLORS</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/contact.css">
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
  <h1>DROP US A MESSAGE</h1>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="addcolor">
			<label>Name<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    		<input type="text" data-validate="required" name="name" placeholder="Eg. John Doe" />

    		<label>Email<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    		<input type="text" data-validate="required" name="email" placeholder="example@gmail.com" />

   			<label>Message<div style="font-size:1.1em; display:inline-block; color:#ed7161;">*</div></label>
    		<textarea></textarea>

    		<!--<label>E-mail address</label>
    		<input type="email" name="email" data-validate="required email" placeholder="user@example.com" />

    		<label>Password</label>
    		<input type="password" data-validate="required" name="password" />-->
    		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    		<input type="reset" name="reset" value="RESET" />
    		<input type="submit" name="submit" value="SEND" />&nbsp;
		</form>

</div>
<a href="http://localhost/ilovecolors/index.php"><div id="icon" class="icon" title="BACK TO HOME"><i class="fa fa-heart"></i></div></a>

<script src="js/classie.js"></script>

	</body>
</html>
