<?php 
/*
Template name: Frontpage
Description: For page on front
*/


if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }

 if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post page frontpage" id="post-<?php the_ID(); ?>">

	<h2 id="pagetitle"><?php echo basic2col_welcome_message(); ?></h2>

	 <?php edit_post_link(__('Edit','basic2col'),'<p class="editlink">','</p>'); ?>
	
	<div class="postcontent">
		<?php the_content(); ?>


		<h3><?php _e('Recent posts','basic2col'); ?></h3>
			<ul>
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
			</ul>
	</div>
	
</div>





<?php endwhile; else : 

	echo basic2col_404_message();

endif; 

if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); }

?>
