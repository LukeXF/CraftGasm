<?php
	if (isset($_GET['success'])){
		$success = "Your form was sent successfully, expect an email back within 24 hours.";
	} else {
		$success = "Only contact via here if it is absolutely critical or business related, for anything else please use the forums.";
	}
	$activeTab = "contact";
	include 'assets/header.php';
	include 'assets/navbar.php';
?>

	<br>

	<?php // 	Begin Main Body		?>

	<h5 class="top-notice"><?php echo $success; ?></h5>
	<div class="container" style="margin-bottom:75px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" name="contactform" action="assets/email.php" class="basic-grey form">
					<label class="col-md-12 form" for="first_name">
						<input id="name" type="text" name="first_name" placeholder="Your Full Name">
					</label>
					
					<label class="col-md-12 form" for="email">
						<input id="email" type="email" name="email" placeholder="Your Email Address">
					</label>
					
					<label class="col-md-12 form" for="comments">
						<textarea id="message" name="comments" placeholder="Your Message to Us"></textarea>
					</label> 
					
					<label class="col-md-12 form" for="captcha">
						<img src="<?php echo $_SESSION['captcha']['image_src'];?>" width="85px;">
						<input id="captcha" type="text" name="captcha" placeholder="Enter the code on the left">
						<?php echo $_SESSION['captcha']['code'] ?>
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
			</div>
		</div>

	</div>
</div>
	<?php // 	Footer		?>
	<footer class="page-footer group h6">
		<div class="container">
			<div class="grid grid--middle">
				<div class="grid__item" style="width:33%">
					<p>© 2014 Elements, LLC. · <a href="terms.php">Terms of Service</a></p>
				</div>
				<div class="grid__item" style="width:33%">
					Copyright Craft Gasm, 2014
				</div>
				<div class="grid__item sneakyhiddenstuff" style="width:33%">
					Designed by <a href="http://luke.sx">Luke Brown</a>
				</div>
			</div>
		</div>
	</footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		
</body>
</html>