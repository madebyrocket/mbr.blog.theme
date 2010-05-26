<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); } ?>
<div id="title"><img src="<?php bloginfo('template_directory'); ?>/images/titles/title_blog.png" width="600" height="64" alt="we like writing" />
  <h1>We love the codes because they do what we say. We'll post what we <code>git push</code> here.</h1>
</div>

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