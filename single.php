<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); } ?>

<div id="content">
  <div id="textServices">
    <img src="<?php bloginfo('template_directory'); ?>/images/content/top.jpg" alt="top" width="854" height="13" class="top" />
    <img src="<?php bloginfo('template_directory'); ?>/images/content/bottom.jpg" alt="bottom" width="854" height="14" class="bottom" />
    <div id="posts">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
        <div class="post home" id="post-<?php the_ID(); ?>">
          <div class="post-header">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>  	
            <h3 class="date"><?php the_time(__('F jS, Y','basic2col')); ?></h3>
            <div class="clear"></div>
        	</div>
        	
        	<div class="postcontent">
            <?php the_content() ?>
        	</div>
        	
        	<p class="postmeta single">
        		<?php _e('Posted in','basic2col'); ?> <?php the_category(',') ?>
                        by <?php the_author() ?>

        		<?php basic2col_tags_front(); ?>		
            
            <?php if(comments_open() || pings_open()) : ?>
        		  - <a href="<?php comments_link(); ?>" title="<?php _e('Comments to','basic2col'); ?> <?php the_title(); ?>">
        		  <?php comments_number('0','1','%'); ?> <?php _e('Comments','basic2col'); ?></a>
        		<?php else : ?>
        			- <?php _e('Comments closed','basic2col'); ?>
        		<?php endif; ?>
        
        		<?php edit_post_link(__('Edit','basic2col'),' - ',''); ?>
        	</p>
        </div>
  
      <?php endwhile; ?>
      <div class="navigation">
      	<div class="left"><?php next_posts_link('&laquo; Older Entries') ?></div>
      	<div class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      	<div class="clear"></div>
      </div>
      
      <?php comments_template(); // Get wp-comments.php template ?>
      <?php else : echo basic2col_404_message(); endif; ?>
    </div>
    <?php basic2col_sidebar() ?>
    <div class="clear"></div>
  </div>
</div>
<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); } ?>
