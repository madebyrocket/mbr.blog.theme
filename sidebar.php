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
		<li id="tagcloud"><h3><?php _e('Tags','basic2col'); ?></h3>
			<?php wp_tag_cloud('smallest=0.8&largest=2&unit=em'); ?>
		</li>

		<li id="randomlinks"><h3><?php _e('Random links','basic2col'); ?></h3>
			<ul>
			<?php wp_list_bookmarks('orderby=rand&categorize=0&limit=10&title_li='); ?>
			</ul>
		</li>



		<li><h3><?php _e('Meta','basic2col'); ?></h3>
			<ul>
			<li>	<a href="<?php bloginfo('rss2_url'); ?>">
				<img src="<?php bloginfo('template_url')?>/gfx/rss.png" alt="RSS" class="rssimg" /> 
				<?php _e('Posts','basic2col'); ?></a></li>
			<li>	<a href="<?php bloginfo('comments_rss2_url'); ?>">
				<img src="<?php bloginfo('template_url')?>/gfx/rss.png" alt="RSS" class="rssimg" />
				<?php _e('Comments','basic2col'); ?></a></li>

			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>

			<?php /*add some support for MU*/ if(is_basic2col_wpmu()) { global $current_site; ?>
			<li><a href="http://<?php echo $current_site->domain . $current_site->path ?>" title="<?php _e('Hosted by','basic2col'); ?> <?php echo $current_site->site_name ?>">
			<?php echo $current_site->site_name ?></a></li>
			
			<?php } wp_meta(); ?>
			</ul>
		</li>

        <?php endif; ?>
    </ul>

</div>
<!-- end sidebar -->