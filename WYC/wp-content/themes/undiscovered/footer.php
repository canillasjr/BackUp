	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-12 padding-0">
				<a class="logo-container" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.png"></a>
			</div>
			<div class="col-md-10 col-sm-9 col-xs-12 padding-0">
				<div class="footer-menu-container">
				<?php wp_reset_query() ?>
					<?php wp_nav_menu(array(
						'theme_location' => 'footer'
					)); ?>
				</div>
			</div>
		</div>
		<div class="link-container">
			<div class="left-text-f">
				<div class="link-t" >Copyright 2017 <a href="williamyoungcontracting.com" class="link-f">williamyoungcontracting.com</a></div>
				<div class="link-t" >All Rights Reserved.</div>
			</div>
			<div class="right-text-f">
				<div class="link-t" ><a href="http://slim-ent.com/" class="link-f">Website Design </a>by SLIM Enterprises</div>
				<div class="link-t" ><a href="https://junespringmultimedia.com/" class="link-f">Web Hosting</a> by June Spring Multimedia</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
