<!-- begin sidebar -->
<div id="sidebar">
        <ul id="sb1">
        <?php dynamic_sidebar('Sidebar 1'); ?>
        </ul>
        
        <ul id="sb2">
	<?php dynamic_sidebar('Sidebar 2'); ?>
	<li>
	<a href="<?php bloginfo('rss2_url'); ?>">
	<img src="<?php bloginfo('template_url')?>/gfx/rss.png" alt="RSS" class="rssimg" /> 
	RSS Feed
	</a>
	</li>
        </ul>
    </ul>

</div>
<!-- end sidebar -->

