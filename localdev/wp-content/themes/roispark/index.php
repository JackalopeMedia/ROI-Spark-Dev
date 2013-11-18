<?php get_header(); ?>

<!-- Start Body -->
	<div class="container">
		<div class="row"><!-- body and sidebar row -->
			<div class="col-sm-9">
				<section class="services">
					<div class="row">
						<div class="lead-image">
							<h1>Services</h1>
							<hr>
							<ul class="inline row">
								<li><i class="icon">Paid Search</i></li>
								<li><i class="icon">Analytics</i></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="lead-image">
							<ul class="inline row">
								<li><i class="icon">Paid Search</i></li>
								<li><i class="icon">Analytics</i></li>
							</ul>
						</div>
					</div>
				</section>
				<br />
				<br />
				<section class="clients row">
					<h1>Clients</h1>
					<hr>
					<?php if (have_posts()) : ?>
					 <ul class="inline row" id="portfolio-sorting">
					 <?php while(have_posts()) : the_post(); ?> 
						<li id="bumpdown"><?php if (has_post_thumbnail()) : ?><?php the_post_thumbnail(); ?><?php endif; ?></li>					<?php endwhile; ?>
					</ul>	
					<?php else: ?>
					<div class="container box align-center">
						<h2>No clients were found.</h2>
					</div>
					<?php endif; ?>
			</section>
<br />
<br />
			<section class="row">
					<h1>Lorem ipsum dalor</h1>
					<hr>
					<br />
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed nulla ut lorem fringilla porta in at libero. Suspendisse odio diam, blandit eget ipsum condimentum, volutpat placerat justo. Vestibulum tellus turpis, suscipit vitae fringilla vitae, pellentesque ut tellus. Phasellus eleifend ac neque non consequat. Curabitur aliquet purus turpis, a feugiat felis tristique quis. Aliquam auctor erat non consectetur cursus. Aliquam pulvinar, libero a tincidunt lacinia, diam ligula dapibus quam, non tristique mi augue non nunc. Sed aliquet lorem nulla, vel lacinia dui elementum et. Suspendisse lobortis a ante nec elementum. Donec cursus quam nec mi semper, mattis ultrices quam consequat. Morbi lectus tortor, rhoncus a mollis ut, fringilla vel nibh.</p>
			</section>
<!-- SIDEBAR -->
			</div>
			<div class="col-sm-3">
				<div class="sidebar-top sidebar-side top-form align-center row">
					<h2>Get in touch with us</h2>
					<form action="" method="POST" class="lead-form">
						<p><input type="text" name="lead-name" id="lead-name" placeholder="Name*" /></p>
						<p><input type="email" name="lead-email" id="lead-email" placeholder="Email*" /></p>
						<p><input type="text" name="lead-phone" id="lead-phone" placeholder="Phone*" /></p>
						<p><input type="text" name="lead-website" id="lead-website" placeholder="Website"></p>
						<p><select name="lead-dropdown" id="lead-dropdown" placeholder="Dropdown">
							<option value="0">- Select Your Option -</option>
							<option value="1">Option #1</option>
							<option value="2">Option #2</option>
							<option value="3">Option #3</option>
						</select></p>
						<p><textarea name="lead-comments" id="lead-comments" rows="4"></textarea></p>	
						<div class="cta">
					<form action="" method="POST" class="lead-form">
						<input type="submit" class="btn btn-primary" value="SUBMIT" />
					</form>
				</div>
				<h1 class="form-number"><i class="phone">512.XXX.XXX</i></h1>
					</form>		
				</div>


				<div>
					<p class="testimonial">
						Testimonial right here.
					</p>
					<p class="testimonial-author">
						- EJ Lawless, Director
					</p>
					<p class="testimonial">
						Testimonial right here.
					</p>
					<p class="testimonial-author">
						- Randy Varella, Director
					</p>
				</div>

				<section>
					<ul class="trust inline">
						<li><img src="img/trust1.jpg"></li>
						<li><img src="img/trust2.jpg"></li>
					</ul>
				</section>
			</div>
		</div>
	</div>
<!-- End Main Body -->

<?php get_footer(); ?>