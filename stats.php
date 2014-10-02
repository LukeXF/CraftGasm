<?php
	$activeTab = "stats";
	include 'assets/header.php';
	include 'assets/navbar.php';
?>

	<br>

	<?php // 	Begin Main Body		?>
	<div class="container">
		<div class="grid">

			<div class="grid__item desk--three-thirds">
				<main class="page-main">
					<pre>
						<?php 
							print_r($navbar); 
							echo $navbar["Help"];
						?>
					</pre>
					<article class="module">
						<?php echo $timeHeader; ?>
						<div class="grid__item desk--one-third sexysearch">




							<?php // 	The search button with javascript to function it below	?>
							<div class="dropdown button-group__small sexysearch">
								<a href="javascript: ctShowAdvancedSearch('ct');" title="Advanced Search" class="button button--small sexypadding">
									<i class="fa fa-search"></i> Advanced Search 
								</a>
							</div>

							<script type="text/javascript">
								var button = document.getElementById("button");
									button.addEventListener("click" ajaxFunction, false);
								var ajaxFunction = function () {
										javascript: ctShowAdvancedSearch('ct');
								}
							</script>




							<select id="dropdowntime" onchange="gotoPage(this)" value="Select Recent" class="sexytime">
								<?php // The timing options you specified above will be placed here ?>
							</select>

							<script>
							// This is for th drop down menu, specif the options above.
							timeSetting = [<?php echo $timeSetting; ?>];
							text = "";
							var i;
							for (i = 0; i < timeSetting.length; i++) {
									 text  += "<option value='?q=" + timeSetting[i] + "'>" + timeSetting[i] + " Minutes </option>";
							}

							// Print the results
							document.getElementById("dropdowntime").innerHTML = text;
							</script>


							<script type="text/javascript">
								function gotoPage(select){
									window.location = select.value;
								}
							</script>
							

					

						</div>

						<?php echo $out;?>

					</article>
				</main>
			</div>

			<?php 
				// Remove the comment to turn on all my sexy stats :D
				// include 'stats.php'; 

			?>

		</div><!-- grid -->
	</div><!-- container -->


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