<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); } ?>
<div id="title"><img src="<?php bloginfo('template_directory'); ?>/images/titles/title_blog.png" width="600" height="64" alt="we like writing" />
  <h1>We love the codes because they do what we say. We'll post what we <code>git push</code> here.</h1>
</div>

<div id="content">
  <div id="textServices">
    <img src="<?php bloginfo('template_directory'); ?>/images/content/top.jpg" alt="top" width="854" height="13" class="top" />
    <img src="<?php bloginfo('template_directory'); ?>/images/content/bottom.jpg" alt="bottom" width="854" height="14" class="bottom" />
    <div id="posts">
      <?php if (have_posts()) :
      
      $post = $posts[0]; // Hack. Set $post so that the_date() works.
      if (is_category()) { ?>				
        <h4 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php echo single_cat_title(); ?> </h4>
      <?php /* If this is a tag archive WP Tags */ } elseif(is_tag()) { ?>
        <h4 id="pagetitle"><?php _e('Posts tagged','precious'); ?> <?php single_tag_title(); ?></h4>
      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h4 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('F jS, Y','basic2col')); ?></h4>
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h4 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('F, Y','basic2col')); ?></h4>
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h4 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('Y','basic2col')); ?></h4>
      <?php /* If this is an author archive */ } elseif (is_author()) {
        if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name); 
        else :
        $curauth = get_userdata(intval($author));
        endif; ?>
        <h4 id="pagetitle"><?php _e('Posts by','basic2col'); ?> <?php echo $curauth->display_name; ?></h4>
        
      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h4 id="pagetitle"><?php _e('Archives','basic2col'); ?></h4>
      <?php } ?>


      <?php while (have_posts()) : the_post(); ?>
      
        <div class="post home" id="post-<?php the_ID(); ?>">
          <div class="post-header">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>  	
            <h3 class="date"><?php the_time(__('F jS, Y','basic2col')); ?></h3>
            <div class="clear"></div>
        	</div>
        	
        	<div class="postcontent">
            <?php the_excerpt() ?>
            <a href="<?php the_permalink() ?>" class="read-more">Read More...</a>
        	</div>
        	
        	<p class="postmeta">
        		<?php _e('Posted in','basic2col'); ?> <?php the_category(',') ?>
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
      <?php else : echo basic2col_404_message(); endif; ?>
    </div>
    <?php basic2col_sidebar() ?>
    <div class="clear"></div>
  </div>
</div>
<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); } ?>