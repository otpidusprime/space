<!DOCTYPE html>
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
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SPACE</title>
		<meta name="description" content="Blueprint: Blueprint: Google Grid Gallery" />
		<meta name="keywords" content="google getting started gallery, image gallery, image grid, template, masonry" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/space.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/tip-twitter/tip-twitter.css" type="text/css" />

	<script src="js/modernizr.custom.js"></script>

	<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="js/jquery.poshytip.js"></script>

<script>
$(document).ready(function(){
    $("dots").css("display", "block");
    $("p").css("display", "none");
    $("#hide").css("display", "none");

    $("#hide").click(function(){
    	$("#hide").css("display", "none");
    	$("#show").css("display", "inline-block");
        $("p").css("display", "none");
        $("dots").css("display", "block");
    });

    $("#show").click(function(){
    	$("#show").css("display", "none");
    	$("#hide").css("display", "inline-block");
        $("p").css("display", "block");
        $("dots").css("display", "none");
    });

    if ($('.subdata').length == 0)
    {
        $('.wrapper').css("display", "none");
        $('.fabarea').css("display", "none");
        $('.no-data').css("display", "block");
    }
    else
    {
    	$('.wrapper').css("display", "block");
    	$('.fabarea').css("display", "block");
        $('.no-data').css("display", "none");
    }

});
</script>

	<script type="text/javascript">
		//<![CDATA[
		$(function(){

			$('#home,#plus,#info,#logout,#delete').poshytip({
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
		<div class="container">
			<div class="header">
				<span><!--span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span--></span>
				<h1 class="logo">SPACE</h1>

				<nav>
					<user>Hi <?php echo ''.$_COOKIE['username'].''; ?></user>
					<!--a href="#" class="bp-icon home" id="home" title="HOME"><i class="fa fa-home"></i></a-->
					<a href="addaccount.php" class="bp-icon plus md-trigger" id="plus" data-modal="modal-12"  title="ADD ACCOUNT"><i class="fa fa-plus"></i></a>

					<a href="#" class="bp-icon info md-trigger" id="info" data-modal="modal-71" title="PROFILE"><i class="fa fa-user"></i></a>

					<a href="logout.php" class="bp-icon con md-trigger" id="logout" data-modal="modal-72" title="LOGOUT"><i class="fa fa-sign-out"></i></a>
				</nav>
			</div>

		</div>

						<div class="no-data">
						<div class="content">
							<div class="greeting">HELLO <?php echo ''.$_COOKIE['username'].''; ?>, WELCOME TO SPACE.</div>
							<div class="sub-greeting">A personal space for your online accounts.</div>
							<div class="datatext">
							 Space makes it easier to remember passwords for your online accounts so that you have to only remember
							  only a single password i.e. your Space Account password which will be your master key to access all your accounts
							   via a single portal.</div>
							<div class="datatext">So, what are you waiting for? Go Ahead, <a href="addaccount.php">Add Your First Account</a>.</div>
							<div class="datatext"><strong>PS:</strong> Don't worry, your account information is encryted in your local database.
							  Therefore we do not have have any access to your account information. <strong><i class="fa fa-smile-o"></i></strong></div>
						</div>
						</div>

			<div class="wrapper">
				<table class="blue">
					<thead>
						<tr>
							<th>Account</th>
							<th>Username/Email</th>
							<th>Password</th>
							<th>Date Added</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!--<div class="wrapper">

  						<div class="table">

    						<div class="row header blue">
     						<div class="cell">
        						Account
      						</div>
      						<div class="cell">
        						Username/Email
      						</div>
      						<div class="cell">
        						Password <button id="show" title="SHOW PASSWORD"><i class="fa fa-eye"></i></button> <button id="hide" title="HIDE PASSWORD"><i class="fa fa-eye-slash"></i></button>
        						<button id="clearfixing-col" style="visibility:hidden;"><i class="fa fa-eye-slash"></i></button>
      						</div>
      						<div class="cell">
        						Date Added
      						</div>
      						<div class="cell">
        						<i class="fa fa-trash-o"></i>
      						</div>
    						</div>-->

						<?php
						$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
						$name = $_COOKIE['username'];
						$query = "SELECT * FROM `accounts` WHERE `username` = '".$name."'";
						$result = mysqli_query($dbc, $query);

							while($row = mysqli_fetch_array($result))
							{
								$linkaddr='delete.php?acc_id='.$row['aid'].'&acc_type='.$row['acctype'].'';
								echo '<tr class="subdata">';
								echo '<td class="social">'.$row['acctype'].'</td>';
								echo '<td class="user-name">'.$row['accname'].'</td>';
								echo '<td class="user-pass"><dots>••••••••••••</dots><p>'.$row['accpassword'].'</p></td>';
								echo '<td class="user-date">'.$row['dateadded'].'</td>';
								echo '<td class="user-del"><a id="delete" title="DELETE THIS ACCOUNT" style="border-bottom: 0;outline:none;" href="'.$linkaddr.'"
									onclick="">×</a></td>';
								echo '</tr>';
							}

						mysqli_close($dbc);
						?>

						</tbody>
					</table>

					</div>

		<div class="fabarea">
			<button id="show"><i class="fa fa-eye"></i></button>
			<button id="hide"><i class="fa fa-eye-slash"></i></button>
        	<button id="clearfixing-col" style="visibility:hidden;"><i class="fa fa-eye-slash"></i></button>
		</div>

<!--<h1 class="up scrollMore">&uarr; UP &uarr;</h1>-->
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/jquery.stickyheader.js"></script>

	</body>
</html>
