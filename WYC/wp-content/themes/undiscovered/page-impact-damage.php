<?php get_header() ?>
<div class="banner-section" style="background: url('<?php the_field('background_image'); ?>')">
	<div class="banner-title"><?php the_field('banner_title') ?></div>
	<div class="banner-sub-title"><?php the_field('banner_sub_title') ?></div>
	<div class="banner-contact"><?php the_field('banner_contact_number') ?></div>
	<a class="banner-btn-contact" href="<?php echo get_permalink(13) ?>">Contact Us</a>
</div>
<?php wp_reset_query(); ?>
<div class="damage-section">
<div class="row full-image-side even-class">
	<div class="col-md-6 padding-0">
		<div class="full-image-container">
			<img src="<?php echo get_the_post_thumbnail_url() ?>">
		</div>
	</div>
	<div class="col-md-6 padding-0">
		<div class="text-container">
			<div class="header-text"><!-- <img  class="damage-icon-page" src="<?php echo get_template_directory_uri() ?>/img/sewage-icon-page.png"> --><?php the_title() ?></div>
			<div class="content-text"><?php the_content() ?></div>
			<a class="content-btn" href="<?php echo get_permalink(13) ?>">Contact Us</a>
		</div>
		
	</div>
</div>
</div>
<div class="contact-section">
	<div class="row">
		<div class="col-md-6 custom-bg">
			<div class="contact-section-box-text">
				<div class="contact-header">Have a problem?</div>
				<div class="contact-sub">William Young Contracting Inc.’s restoration specialists can help you!</div>
				<div class="content-contact-box">
					<div class="location">
					William Young Contracting Inc., DKI<br>
					45 Brisbane Road, Unit 5<br>
					Toronto, ON M3J 2K1 Canada
					</div>
					<div class="contact">
					(905) 760-0939
					</div>
					<div class="site">
					williamyoungcontracting.com
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="contact-section-form">
				<?php echo do_shortcode('[contact-form-7 id="45" title="Solution"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>