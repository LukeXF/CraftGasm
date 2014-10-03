<?php
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
	$activeTab = "contact";
	include 'assets/header.php';
	include 'assets/navbar.php';
?>

<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
<?php
	// define variables and set to empty values
	$first_name = $email_from = $comments = $captcha = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first_name = $_POST['first_name']; // required
		$email_from = $_POST['email']; // required
		$comments = $_POST['comments']; // required
		$captcha = $_POST["captcha"];
		$maincaptcha = $_POST["maincaptcha"];
		$success = "You have already send a contact form in the last " . $email_timer . " seconds. Please wait or try again later.";

	} else {
		$success = "Only contact via here if it is absolutely critical or business related, for anything else please use the forums.";
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $email_timer)) {
		// last request was more than 30 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		$breaktime = 1;
		$success = "Your form was sent successfully, expect an email back within 24 hours.";

	} else {
		$breaktime = 0;
	}
	//time() . " - " . $_SESSION['LAST_ACTIVITY'];
	//date("H:i:s",time()) . " - " . date("H:i:s",$_SESSION['LAST_ACTIVITY']);
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


?>
	<h5 class="top-notice"><?php echo $success; ?></h5>
	<div class="container" style="margin-bottom:75px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"  style="margin-top:75px;">

				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
					<label class="col-md-12 form" for="first_name">
						<input id="name" type="text" name="first_name" placeholder="Your Full Name">
					</label>
					
					<label class="col-md-12 form" for="email">
						<input id="email" type="email" name="email" placeholder="Your Email Address">
					</label>
					
					<label class="col-md-12 form" for="comments">
						<textarea id="message" name="comments" placeholder="Your Message to Us"></textarea>
					</label> 
					
					<div class="col-md-2">
						<img src="<?php echo $_SESSION['captcha']['image_src'];?>" alt="captcha" style="min-width: 104px;">
					</div>

					<label class="col-md-10 form" for="captcha">
						<input id="captcha" type="text" name="captcha" placeholder="Captcha">
					</label> 

					<label class="col-md-12 form" style="opacity:0;position: absolute;top: 0;max-height: 0px;max-width: 0px;" for="maincaptcha">
						<input id="maincaptcha" type="text" style="opacity:0;" name="maincaptcha" value="<?php echo $_SESSION['captcha']['code'] ?>">
					</label> 
					 <label class="col-md-12 form">
						<select name="selection">
							<option value="Job Inquiry">Staff Inquiry</option>
							<option value="General Question">General Question</option>
							<option value="Business Inquiry">Business Inquiry</option>
						</select>
					</label>    
					<label>
						<span>&nbsp;</span> 
						<input type="submit" value="Submit" class="button"> 
					</label>  
				</form>

				<?php

				if (($maincaptcha == $captcha) && ($breaktime == 1)){
					if(isset($_POST['email'])) {
						 // EDIT THE 2 LINES BELOW AS REQUIRED
					 
						 $email_to = "me@luke.sx";
						 $email_subject = "Email form from Craft Gasm website from " . $email_from;
					 
						 function died($error) {
								// your error code can go here
								echo "We are very sorry, but there were error(s) found with the form you submitted. ";
								echo "These errors appear below.<br /><br />";
								echo $error."<br /><br />";
								echo "Please go back and fix these errors.<br /><br />";
								die();
						 }
					 
						 // validation expected data exists
						 if(!isset($_POST['first_name']) ||
								!isset($_POST['email']) ||
								!isset($_POST['comments'])) {
								died('We are sorry, but there appears to be a problem with the form you submitted.');       
						 }
					 
						 $first_name = $_POST['first_name']; // required
						 $email_from = $_POST['email']; // required
						 $comments = $_POST['comments']; // required
					 
						 $error_message = "";
					 
						 $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
					 
						if(!preg_match($email_exp,$email_from)) {
					 
						 $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
					 
						}
					 
						$string_exp = "/^[A-Za-z .'-]+$/";
					 
						if(!preg_match($string_exp,$first_name)) {
					 
						 $error_message .= 'The First Name you entered does not appear to be valid.<br />';
						}
						if(strlen($comments) < 2) {
						 $error_message .= 'The Comments you entered do not appear to be valid.<br />';
						}
					 
						if(strlen($error_message) > 0) {
						 died($error_message);
						}
					 
						$email_message = "Hey there Cam, the contact form on CraftGasm has been filled out and sent to your inbox. The message is as follows:\n\n";
					 
							
					 
						function clean_string($string) {
						$bad = array("content-type","bcc:","to:","cc:","href");
						return str_replace($bad,"",$string);
						}
					 
							
					 
						 $email_message .= "<b>First Name:</b> ".clean_string($first_name)."\n";
						 $email_message .= "Last Name: ".clean_string($last_name)."\n";
						 $email_message .= "Email: ".clean_string($email_from)."\n";
						 $email_message .= "Telephone: ".clean_string($telephone)."\n";
						 $email_message .= "Comments: ".clean_string($comments)."\n";
						 
					 
					// create email headers
					 
					$headers = 'From: '.$email_from."\r\n".
					'Reply-To: '.$email_from."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					@mail($email_to, $email_subject, $email_message, $headers);  
				}
				echo "<h2>TESTING - Your Input:</h2>";
				echo $first_name;
				echo "<br>";
				echo $email_from;
				echo "<br>";
				echo $comments;
				echo "<br>";
				echo "main: " . $maincaptcha;
				echo "<br>";
				echo "cap person: " . $captcha;
				echo "<br>";

				?>
			</div>
		</div>
	</div>
</body>
</html>

<?php
}
//header( 'Location: http://gillian-allard.com/contact.php?success' )
?>
