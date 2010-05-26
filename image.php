<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="post image" id="post-<?php the_ID(); ?>">

	<h2 id="pagetitle"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">
		<?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?>
	</h2>
	
	

	<div class="postcontent">
		<p class="image"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>

                <p class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></p>


		<?php the_content(); ?>
	
		
	</div>
	
	
            


</div>

	<ul id="postnav">
		<?php next_post_link('<li class="right">%link &raquo;</li>'); ?>
		<?php previous_post_link('<li class="left">&laquo; %link</li>'); ?>
	</ul>


	


<?php endwhile; else : 

	echo basic2col_404_message(); 

endif; 

if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); }

?>
