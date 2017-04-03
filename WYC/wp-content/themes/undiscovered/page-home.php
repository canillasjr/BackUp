<?php get_header() ?>
<div class="banner-section" style="background: url('<?php the_field('background_image'); ?>')">
	<div class="banner-title"><?php the_field('banner_title') ?></div>
	<div class="banner-sub-title"><?php the_field('banner_sub_title') ?></div>
	<div class="banner-contact"><?php the_field('banner_contact_number') ?></div>
	<a class="banner-btn-contact" href="<?php echo get_permalink(13) ?>">Contact Us</a>
</div>
<div class="about-us-section">
	<div class="row">
		<div class="col-md-6">
		<div class="section-box">
			<?php

			    // query for the about page
			    $cpage = new WP_Query( 'pagename=about us' );
			    // "loop" through query (even though it's just one page) 
			    while ( $cpage->have_posts() ) : $cpage->the_post();
			    ?>
			    <div class="section-about-title"><?php the_title(); ?></div>
			    <div class="section-about-content"><?php the_content(); ?></div>
			    <a class="section-btn" href="<?php echo get_permalink(13) ?>">Contact Us</a>
			    <?php
			    endwhile;
			    // reset post data (important!)
			    wp_reset_postdata();
			?>
		</div>
		</div>
		<div class="col-md-6 custom-bg">
			<div class="section-box">
			<div class="damages-header">Our Restorations</div>
			<div class="damage-blocks">
				<div class="damages-box">
					<i class="sprite-fire"></i>
					<?php
					    // query for the about page
					    $cpage = new WP_Query(array( 'post_type' => 'page','post_parent' => 9 , 'page_id' => 27 ) );
					    // "loop" through query (even though it's just one page) 
					    while ( $cpage->have_posts() ) : $cpage->the_post();
					    ?>
					    <div class="damage-name"><?php the_title(); ?></div>
					    <?php
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();
					?>
				</div>
				<div class="damages-box">
					<i class="sprite-water"></i>
					<?php
					    // query for the about page
					    $cpage = new WP_Query(array( 'post_type' => 'page','post_parent' => 9 , 'page_id' => 29 ) );
					    // "loop" through query (even though it's just one page) 
					    while ( $cpage->have_posts() ) : $cpage->the_post();
					    ?>
					    <div class="damage-name"><?php the_title(); ?></div>
					    <?php
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="damage-blocks">
				<div class="damages-box">
					<i class="sprite-sewage"></i>
					<?php
					    // query for the about page
					    $cpage = new WP_Query(array( 'post_type' => 'page','post_parent' => 9 , 'page_id' => 31 ) );
					    // "loop" through query (even though it's just one page) 
					    while ( $cpage->have_posts() ) : $cpage->the_post();
					    ?>
					    <div class="damage-name"><?php the_title(); ?></div>
					    <?php
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();
					?>
				</div>
				<div class="damages-box">
					<i class="sprite-flood"></i>
					<?php
					    // query for the about page
					    $cpage = new WP_Query(array( 'post_type' => 'page','post_parent' => 9 , 'page_id' => 33 ) );
					    // "loop" through query (even though it's just one page) 
					    while ( $cpage->have_posts() ) : $cpage->the_post();
					    ?>
					    <div class="damage-name"><?php the_title(); ?></div>
					    <?php
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="see-all-container"><a class="see-all" href="<?php echo get_permalink(27) ?>">SEE ALL</a></div>
			</div>
		</div>
	</div>
</div>
<div class="image-section">
	<div class="row">
		<div class="img-container"><img src="<?php the_field('image_1') ?>"></div>
		<div class="img-container"><img src="<?php the_field('image_2') ?>"></div>
		<div class="img-container"><img src="<?php the_field('image_3') ?>"></div>
		<div class="img-container"><img src="<?php the_field('image_4') ?>"></div>
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
<?php get_footer(); ?>