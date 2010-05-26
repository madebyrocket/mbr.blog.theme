<?php 

if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }

 if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post page" id="post-<?php the_ID(); ?>">

	<h2 id="pagetitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	 <?php edit_post_link(__('Edit','basic2col'),'<p>','</p>'); ?>
	
	<div class="postcontent">
		<?php the_content(); ?>

		<?php wp_link_pages('before=<p id="pages">'.__('Pages:','basic2col').'&after=</p>'); ?>


		<?php /*subpages*/ $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
		if ($children) {?>
			<h3 id="subpages"><?php _e('Subpages','basic2col'); ?></h3>
			<ul>
				<?php echo $children; ?>
			</ul>
		<?php } ?>

	</div>


	<p class="postmeta"><?php _e('Updated on','basic2col'); ?> <?php the_modified_date(); ?></p>

	
</div>


	<?php comments_template();?>


<?php endwhile; else : 

	echo basic2col_404_message();

endif; 

if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); }

?>
