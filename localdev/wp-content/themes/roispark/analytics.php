<?php 
	/* Template Name: Analytics */
?>


<?php 

	// Function for email address validation
	function isEmail($verify_email) {
	
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$verify_email));
	
	}
	
	$error_name = false;
	$error_email = false;
	$error_phone = false;
	$error_website = false;
	$error_prj_type = false;
	$error_prj_description = false;

	if (isset($_POST['lead-submit'])) {
		// Initialize the variables
		$name = '';
		$email = '';
		$phone = '';
		$website = '';
		$type = '';
		$description = '';
		
		// Get the name
		if (trim($_POST['lead-name']) === '') {
			$error_name = true;
		} else {
			$name = trim($_POST['lead-name']);
		}
		
		// Get the email
		if (trim($_POST['lead-email']) === '' || !isEmail($_POST['lead-email'])) {
			$error_email = true;
		} else {
			$email = trim($_POST['lead-email']);
		}

		// Get the phone number
		if (trim($_POST['lead-phone']) === '') {
			$error_phone = true;
		} else {
			$phone = trim($_POST['lead-phone']);
		}
		
		// Get the website
		if (trim($_POST['lead-website']) === '') {
			$error_website = true;
		} else {
			$website = trim($_POST['lead-website']);
		}

		// Get the project type
		if (trim($_POST['lead-project-type']) === '0') {
			$error_prj_type = true;
		} else {
			$type = trim($_POST['lead-project-type']);
		}
		
		// Get the project description
		if (trim($_POST['lead-project-description']) === '') {
			$error_prj_description = true;
		} else {
			$description = stripslashes(trim($_POST['lead-project-description']));
		}

		// Check if we have errors
		if (!$error_name && !$error_email && !$error_phone && !$error_website && !$error_prj_type && !$error_prj_description) {
			// Get the receiver email from the WP admin panel
			$receiver_email = get_option('admin_email'); // Get email from WP backend

			$subject = "New Lead: $name";
			$body = "You have a new quote request from $name from $website. Project details:" . PHP_EOL . PHP_EOL;
			$body .= "Project type: $type" . PHP_EOL;
			$body .= "Project description: $description" . PHP_EOL . PHP_EOL;
			$body .= "You can contact $name via email at $email or via phone at $phone.";
			$body .= PHP_EOL . PHP_EOL;
			
			$headers = "From: $email" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

			// If all is good, we send the email
			if (mail($receiver_email, $subject, $body, $headers)) {
				$email_sent = true;
			} else {
				$email_sent_error = true;
			}
		}
	}
	
?>


<?php get_header(); ?>

<!-- Start Header Img -->
<div class="container-non-responsive">
	<div class="col-xs-9">
		<div id="widgetized-area">
			<div class="header-img">
	
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('analytics-header-img')) : else : ?>
	
				<div class="pre-widget">
					<p><strong>Widgetized Area</strong></p>
					<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
				</div>
	
				<?php endif; ?>
	
			</div>
		</div>
	</div>
</div>

<!-- End Header Img -->




<!-- Start Body -->
	<div class="container-non-responsive">
		<div class="row"><!-- body and sidebar row -->
			<div class="col-xs-9">
				<section class="row">
					<div id="about-us-area">
	
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('analytics-area')) : else : ?>

						<div class="pre-widget">
							<p><strong>Widgetized Area</strong></p>
							<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
						</div>

						<?php endif; ?>
	
					</div>
				</section>
				<section class="clients row">
					<div id="widgetized-area">

						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widgetized-area')) : else : ?>

						<div class="pre-widget">
							<p><strong>Widgetized Area</strong></p>
							<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
						</div>

						<?php endif; ?>

					</div>
			</section>
<!-- SIDEBAR -->
			</div>
			<div class="col-xs-3">
				<div class="sidebar-top sidebar-side top-form align-center row">

<!-- Contect Form Confirmation -->
		
		<?php if (isset($email_sent) && $email_sent == true) : ?>
				
					<h2>Success!</h2>
					<p>You have successfully sent your contact info. We'll get back to you as soon as possible.</p>
				
				<?php elseif (isset($email_sent_error) && $email_sent_error == true) : ?>

					<h2>There was an error!</h2>
					<p>Unfortunately, there was an error while trying to send the email. Please try again.</p>
					
				<?php else : ?>
<!-- End Contact Form Conf. -->

					<h2>Get in touch with us</h2>
					<form action="<?php the_permalink(); ?>" method="POST" class="lead-form" novalidate>
						<p <?php if ($error_name) echo 'class="error"'; ?>><input type="text" name="lead-name" id="lead-name" value="<?php if (isset($_POST['lead-name'])) echo $_POST['lead-name']; ?>" placeholder="Name*" /></p>
						<p <?php if ($error_email) echo 'class="error"'; ?>><input type="email" name="lead-email" id="lead-email" value="<?php if (isset($_POST['lead-name'])) echo $_POST['lead-email']; ?>" placeholder="Email*" /></p>
						<p <?php if ($error_phone) echo 'class="error"'; ?>><input type="text" name="lead-phone" id="lead-phone" value="<?php if (isset($_POST['lead-name'])) echo $_POST['lead-phone']; ?>" placeholder="Phone*" /></p>
						<p <?php if ($error_website) echo 'class="error"'; ?>><input type="text" name="lead-website" id="lead-website" value="<?php if (isset($_POST['lead-website'])) echo $_POST['lead-website']; ?>" placeholder="Website*"></p>
						<p <?php if ($error_prj_type) echo 'class="error"'; ?>><select name="lead-project-type" id="lead-project-type" placeholder="Project Type*">
							<option value="0">Project type:</option>
							<option value="1" <?php if (isset($_POST['lead-project-type']) && $_POST['lead-project-type']  == '1' ) echo 'selected'; ?>>Website</option>
							<option value="2" <?php if (isset($_POST['lead-project-type']) && $_POST['lead-project-type']  == '2' ) echo 'selected'; ?>>Option #2</option>
							<option value="3" <?php if (isset($_POST['lead-project-type']) && $_POST['lead-project-type']  == '3' ) echo 'selected'; ?>>Option #3</option>
							</select>
						
						</p>
						<p <?php if ($error_prj_description) echo 'class="error"'; ?>><textarea name="lead-project-description" id="lead-project-description" rows="4"><?php if (isset($_POST['lead-project-description'])) echo $_POST['lead-project-description']; ?></textarea></p>	
						<div class="cta">
							<input type="hidden" id="lead-submit" name="lead-submit" value="true" />
							<input type="submit" class="btn btn-primary" value="SUBMIT" />
						</div>
					</form>
				</div>
				<h1 class="form-number"><i class="phone">512.XXX.XXX</i></h1>
					</form>		
				</div>
				
				<?php endif; ?>
<!-- End CTA -->	

				<div id="testimonial-area">

						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('testimonial-area')) : else : ?>

						<div class="pre-widget">
							<p><strong>Widgetized Area</strong></p>
							<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
						</div>

						<?php endif; ?>

					</div>

				<section>
					<ul class="trust inline">
						<li><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/trust1.jpg"></li>
						<li><img src="http://kickstartyourbiz.info/wp-content/uploads/2013/11/trust1.jpg"></li>
					</ul>
				</section>
			</div>
		</div>
	</div>
<!-- End Main Body -->


<?php get_footer(); ?>
