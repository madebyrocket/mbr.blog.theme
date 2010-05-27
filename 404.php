<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); } ?>

<div id="content">
  <div id="textServices">
    <img src="<?php bloginfo('template_directory'); ?>/images/content/top.jpg" alt="top" width="854" height="13" class="top" />
    <img src="<?php bloginfo('template_directory'); ?>/images/content/bottom.jpg" alt="bottom" width="854" height="14" class="bottom" />
    <div id="posts">
      <?php echo basic2col_404_message(); ?>
    </div>
    <?php basic2col_sidebar() ?>
    <div class="clear"></div>
  </div>
</div>
<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); } ?>
