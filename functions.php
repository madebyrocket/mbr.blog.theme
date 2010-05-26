<?php


/*some template functions to make child theme customization a bit more flexible*/

/*basic2col_navbar - either create a function and hook into 'basic2col' navbar or create a file called navbar.php*/
function basic2col_navbar() {
	do_action('basic2col_navbar'); 

	if(function_exists('precious_get_file')) { precious_get_file('navbar'); } else {

		if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/navbar.php')) {
			load_template(STYLESHEETPATH . '/navbar.php');
		} elseif (file_exists(TEMPLATEPATH . '/navbar.php')) {
			load_template(TEMPLATEPATH . '/navbar.php');
		}
	}

}

function basic2col_contentheader() {

	do_action('basic2col_contentheader'); 

	if(function_exists('precious_get_file')) { precious_get_file('contentheader'); } else {

		if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/contentheader.php')) {
			load_template(STYLESHEETPATH . '/contentheader.php');
		} else {
			load_template(TEMPLATEPATH . '/contentheader.php');
		}
	}

}


function basic2col_contentfooter() {
	do_action('basic2col_contentfooter'); 

	if(function_exists('precious_get_file')) { precious_get_file('contentfooter'); } else {

		if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/contentfooter.php')) {
			load_template(STYLESHEETPATH . '/contentfooter.php');
		} else {
			load_template(TEMPLATEPATH . '/contentfooter.php');
		}
	}

}


function basic2col_sidebar() {
	do_action('basic2col_sidebar'); 

	if(function_exists('precious_get_file')) { precious_get_file('sidebar'); } else {

		if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/sidebar.php')) {
			load_template(STYLESHEETPATH . '/sidebar.php');
		} else {
			load_template(TEMPLATEPATH . '/sidebar.php');
		}
	}

}

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');




/*language support - .mo files need to have names like basic2col-LANG_code.mo and should be added to the /lang directory*/
function basic2col_textdomain($domain = 'basic2col') {
	global $l10n;

	$locale = get_locale();
	if ( empty($locale) )
		$locale = 'en_US';

	$mofile = TEMPLATEPATH . "/lang/basic2col-$locale.mo";
	load_textdomain('basic2col', $mofile);
}


function basic2col_lang_init() {
	basic2col_textdomain($domain);
}
add_action('init', 'basic2col_lang_init' );

/*support for wpmu*/
function is_basic2col_wpmu() {
	return function_exists('is_site_admin');
}

/*basic2col css files support*/
function basic2col_css() { ?>

	<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/classes.css" media="all" rel="stylesheet" />
	<link type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" rel="stylesheet" />
<!--[if lte IE 7]>
	<link type="text/css" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/style-ie.css" media="screen" rel="stylesheet" />
<![endif]-->
	<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/print.css" media="print" rel="stylesheet" />

	<?php do_action('basic2col_css'); ?>

<?php } 


/*filters */

/*This filter allows you to remove the tag list from the frontpage or set it up differently*/
function basic2col_tags_front() {
	$tags = ' ' . the_tags(__('- Tags:  ','basic2col'), ', ', '') . ' ';

	echo apply_filters('basic2col_tags_front', $tags);

}


/*This filter let you change the 404 message*/
function basic2col_404_message() {
	$message = '<h2 id="pagetitle">'.__('404 Not Found','basic2col') .'</h2>
	<p>'. __('Whatever you were looking for can not be found','basic2col') .'</p>';

	return apply_filters('basic2col_404_message', $message);
}

/*This filter let you change the welcome message if you use a page on front*/
function basic2col_welcome_message() {
	$message = ''.__('Welcome to ','basic2col') . get_bloginfo('name') .'';

	return apply_filters('basic2col_welcome_message', $message);
}

/*This filter let you change the doctype*/
function basic2col_doctype() {
	$doctype = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

	return apply_filters('basic2col_doctype', $doctype);
}


/*This filter let you change the awaiting moderation message*/
function basic2col_moderation_message() {
	$message = ''.__('Your comment is awaiting moderation','basic2col').'';

	return apply_filters('basic2col_moderation_message', $message);
}


/*Blix archive http://rmarsh.com/plugins/blix-archive/*/
function basic2col_archive($show_comment_count=false, $before='<h3>', $after='</h3>', $listclass='postspermonth') {
 	$result = false;
	// if the Plugin Output Cache is installed we can cheat...
	if (defined('POC_CACHE')) {
		$key = 'b_a'.$before.$after.$listclass;
		$cache = new POC_Cache();
		$cache->timer_start();
		$result = $cache->fetch($key);
		if ($result) $cache_time = sprintf('<!-- Compact Archive took %.3f seconds from the cache -->', $cache->timer_stop());
	}
	// ... otherwise we do it the hard way
	if (false === $result) {
		$result = get_basic2col_archive($show_comment_count, $before, $after, $listclass);
		if (defined('POC_CACHE')) $cache->store($key, $result);
	} 
	echo $result;
	if (defined('POC_CACHE')) echo $cache_time;
}

/********************************************************************************************************
	Stuff below this point is not meant to be used directly
*********************************************************************************************************/

function get_basic2col_archive($show_comment_count, $before, $after, $listclass) {
	global $month, $wpdb, $wp_version;
	$result = '';
	$below21 = version_compare($wp_version, '2.1','<');
	// WP 2.1 changed the way post_status and post_type fields work
	if ($below21) {
		$now        = current_time('mysql');
		$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM " . $wpdb->posts . " WHERE post_date <'" . $now . "' AND post_status='publish' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC");
	} else {
		$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM " . $wpdb->posts . " WHERE post_type='post' AND post_status='publish' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC");
	}
	if ($arcresults) {
		foreach ($arcresults as $arcresult) {
			$url  = get_month_link($arcresult->year, $arcresult->month);
    		$text = sprintf('%s %d', $month[zeroise($arcresult->month,2)], $arcresult->year);
    		$result .= get_archives_link($url, $text, '', $before, $after);

			$thismonth   = zeroise($arcresult->month,2);
			$thisyear = $arcresult->year;
			if ($below21) {
				$arcresults2 = $wpdb->get_results("SELECT ID, post_date, post_title, comment_status FROM " . $wpdb->posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_status='publish' AND post_password='' ORDER BY post_date DESC");
			} else {
				$arcresults2 = $wpdb->get_results("SELECT ID, post_date, post_title, comment_status FROM " . $wpdb->posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC");
			}
        	if ($arcresults2) {
        		$result .= "<ul class=\"$listclass\">\n";
            	foreach ($arcresults2 as $arcresult2) {
               		if ($arcresult2->post_date != '0000-00-00 00:00:00') {
                 		$url       = get_permalink($arcresult2->ID);
                 		$arc_title = $arcresult2->post_title;

                 		if ($arc_title) $text = strip_tags($arc_title);
                    	else $text = $arcresult2->ID;

                   		$result .= "<li>".get_archives_link($url, $text, '');
						if ($show_comment_count) {
							$comments = mysql_query("SELECT comment_ID FROM " . $wpdb->comments . " WHERE comment_post_ID=" . $arcresult2->ID);
							$comments_count = mysql_num_rows($comments);
							if ($arcresult2->comment_status == "open" OR $comments_count > 0) $result .= '&nbsp;('.$comments_count.')';
						}
						$result .= "</li>\n";
                 	}
            	}
            	$result .= "</ul>\n";
        	}
		}
	}
	return $result;
}


/*register sidebars*/
	if ( function_exists('register_sidebars') )
			register_sidebars(2, array(
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));


/*basic2col widgets*/
function widget_basic2col_search() { ?>

		<li id="search">
		<form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
			<h2><label for="s"><?php _e('Search','basic2col'); ?></label></h2>
			<div>
				<input type="text" value="" name="s" id="s" />
				<input type="submit" class="submit" accesskey="s" value="<?php _e('Search','basic2col'); ?>" />
			</div>
			</form>
		</li>
<?php }
	if ( function_exists('register_sidebar_widget') )
		register_sidebar_widget(__('Search','basic2col'), 'widget_basic2col_search');



/*Add your own functions - need to be added to parent theme as a child theme can use have it's own functions.php file */
if(file_exists(TEMPLATEPATH . '/my-functions.php')) {
	require_once('my-functions.php');
}

?>
