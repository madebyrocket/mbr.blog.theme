<!-- begin sidebar -->
<div id="sidebar">
	<ul id="sb1">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 1') ) : else : ?>

	<?php if((function_exists('is_front_page') && !is_front_page()) && !is_home())/*link to home */{ ?>
		<li id="homelink"><a href="<?php bloginfo('url'); ?>/"><?php _e('&laquo; Back To Blog','basic2col'); ?></a></li>
	<?php } ?>


	<li id="search">
	<form id="searchform" method="get" action="<?php bloginfo('url') ?>">
		<div>
			<input type="text" value="" name="s" id="s" />
			<input type="submit" class="submit" accesskey="s" value="<?php _e('Search','basic2col'); ?>" />
		</div>
		</form>
	</li>


	<?php wp_list_pages('sort_column=menu_order&title_li=<h3>' . __('Pages','basic2col') . '</h3>'); ?>


	
	<?php wp_list_categories('sort_column=name&show_count=1&title_li=<h3>' . __('Categories','basic2col') . '</h3>'); ?>
	<?php endif; ?>
	</ul>



	<ul id="sb2">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 2') ) : else : ?>



        <?php endif; ?>
    </ul>

</div>
<!-- end sidebar -->
