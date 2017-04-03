<?php get_header() ?>
<div class="banner-section" style="background: url('<?php the_field('background_image'); ?>')">
	<div class="banner-title"><?php the_field('banner_title') ?></div>
	<div class="banner-sub-title"><?php the_field('banner_sub_title') ?></div>
	<div class="banner-contact"><?php the_field('banner_contact_number') ?></div>
	<a class="banner-btn-contact" href="<?php echo get_permalink(13) ?>">Contact Us</a>
</div>
<?php  query_posts(array('posts_per_page'=>-1,'post_type'=>'is-about-us','order'=>'ASC'));?>
<?php $count=1; ?>
<?php while(have_posts()){the_post();?>
	

<?php 
	if($count%2!=0){
?>
<div class="row full-image-side odd-class">
	<div class="col-md-6 padding-0">
		<div class="text-container">
			<div class="header-text"><?php the_title() ?></div>
			<div class="content-text"><?php the_content() ?></div>
			<a class="content-btn" href="<?php echo get_permalink(13) ?>">Contact Us</a>
		</div>
	</div>
	<div class="col-md-6 padding-0">
		<div class="full-image-container">
			<img src="<?php echo get_the_post_thumbnail_url() ?>">
		</div>
	</div>
</div>
<?php
	}else{
?>
<div class="row full-image-side even-class">
	<div class="col-md-6 padding-0">
		<div class="full-image-container">
			<img src="<?php echo get_the_post_thumbnail_url() ?>">
		</div>
	</div>
	<div class="col-md-6 padding-0">
		<div class="text-container">
			<div class="header-text"><?php the_title() ?></div>
			<div class="content-text"><?php the_content() ?></div>
			<a class="content-btn" href="<?php echo get_permalink(13) ?>">Contact Us</a>
		</div>
		
	</div>
</div>
<?php
	}
 ?>




<?php $count++;} ?>

<?php get_footer() ?>