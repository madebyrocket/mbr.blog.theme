<?php 
/*language stuff*/
if(function_exists('load_betterlang_textdomain')) { load_betterlang_textdomain('basic2col'); } else { basic2col_textdomain(); }
/*doctype*/
echo basic2col_doctype(); 
?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
    
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title>
        <?php wp_title(' | ',true,'right'); ?> <?php bloginfo('name'); ?>
        <?php if (is_home() || is_front_page()) { ?> : <?php bloginfo('description'); ?><?php } ?>
    </title>
    
    <meta name="Keywords" content="rocket, Boise, Idaho, Mac apps, iPhone apps, iPad apps, web apps, websites, web development, web design, icons, rails" />
    <meta name="Description" content="rocket is a design + development company that creates web, Mac, iPhone and iPad apps located in Boise, Idaho" />
    
    <?php basic2col_css() ?>
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/application.js"></script>
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); ?>    
  </head>
    
  <body class="<?php do_action('basic2col_bodyclass'); ?>">    
    <div id="logo">
      <a href="index.php">
        <img src="<?= bloginfo('template_directory'); ?>/images/rocketLogo.png" width="181" height="70" alt="rocket logo" />
      </a>
    </div>
    
    <div id="container">
      <div id="navbar">
        <ul>
          <li class="home"><a href="index.php">home</a></li>
          <li class="software"><a <?php if($selected=="software"){print("class='current'");} ?> href="software.php">software</a></li>
          <li class="design"><a <?php if($selected=="design"){print("class='current'");} ?> href="design.php">design</a></li>
          <li class="development"><a <?php if($selected=="development"){print("class='current'");} ?> href="development.php">development</a></li>
          <li class="about"><a <?php if($selected=="about"){print("class='current'");} ?> href="about.php">about</a></li>
          <li class="blog"><a <?php if($selected=="blog"){print("class='current'");} ?> href="blog.php">blog</a></li>
          <li class="contact"><a <?php if($selected=="contact"){print("class='current'");} ?> href="contact.php">contact</a></li>
        </ul>
      </div>