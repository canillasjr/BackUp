<?php get_header() ?>
<div class="faq-container">
	<div class="faq-header"><?php the_title() ?></div>
	<div class="panel-group" id="accordion">
<?php query_posts(array('posts_per_page'=>-1,'post_type'=>'is-faq','order'=>'ASC')); ?>
<?php $count = 1; ?>
<?php while(have_posts()){the_post(); ?>
	
	
	    <div class="panel panel-default faq-content">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a class="accordion-toggle <?php echo $class = ($count==1) ? "" : "collapsed" ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count ?>">
	           <?php the_title() ?>
	          </a>
	        </h4>
	      </div>
	      <div id="collapse<?php echo $count ?>" class="panel-collapse collapse <?php echo $class = ($count==1) ? "in" : "" ?>">
	        <div class="panel-body">
	         <?php the_content() ?>
	        </div>
	      </div>
	    </div>
	

<?php $count++; ?>
<?php } ?>
</div>
</div>
<?php get_footer() ?>