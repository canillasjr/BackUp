<?php get_header() ?>
<div class="service-area-content">
	<div class="service-area-title"><?php the_title() ?></div>
	<?php wp_reset_query() ?>
	<div class="service-content"><?php the_content() ?></div>
	<div class="image-map"><img src="<?php echo get_the_post_thumbnail_url() ?>"></div>
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
		<div class="col-md-6">
			<div class="contact-section-form">
				<?php echo do_shortcode('[contact-form-7 id="45" title="Solution"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>