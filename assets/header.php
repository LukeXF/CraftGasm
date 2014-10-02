<?php
	include_once('assets/configurations.php'); // Settings for this project (edit this)
	include_once('assets/Main.php'); //	The compress backbone for this project
	include('assets/color.php'); // The background color selection for the importance level
	include('assets/time.php'); // The time frame selector to search by minutes
	include('assets/send.php'); // Makes the magic happen!

?>
<!-- 	
	This code and project was developed under contact by NivanaMC
	To Luke Brown (me@luke.sx). If you like what you see, rather
	than trying to steal my code - contact me and we can work together.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>CraftGasm</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
	<link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:700" rel="stylesheet">
	<link rel="shortcut icon" href="/assets/img/favicon.ico">
	<script type="text/javascript" src="js/lukebrown-ajax.min.js"></script>
  	<link rel="stylesheet" href="//craftilldawn.com/buycraft/stylesheet.css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" >
</head>

<body>
<div class="page-wrap">

<?php
	// Sets the values for the navbar
	$navbar = array(
		"home" =>   array(
			"active" => "",
			"url" => "//dev.craftgasm.net",
			"submenu" => array()
		),

		"vote" =>   array(
			"active" => "",
			"url" => "",          
			"submenu" => array()
		),

		"forum" =>  array(
			"active" => "",
			"url" => "//craftgasm.net/forums",          
			"submenu" => array()
		),

		"bans" =>    array(
			"active" => "",
			"url" => "",          
			"submenu" => array()
		),

		"staff" =>  array(
			"active" => "",
			"url" => "",          
			"submenu" => array()
		),

		"stats" =>  array(
			"active" => "",
			"url" => "",          
			"submenu" => array()
		),

		"help" =>   array(
			"active" => "",
			"url" => "",          
			"submenu" => 
				array(
						"MailSupport" => "", 
						"Skyblock"     => "", 
						"Factions"     => "" 
				)
		),

		"contact"=>array(
			"active" => "",
			"url" => "",          
			"submenu" => array()
		)

	)
?>