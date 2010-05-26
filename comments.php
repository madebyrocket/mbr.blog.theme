<div id="commentbox">
	<div class="comment-header">
    	<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
            <p><?php _e('Enter password to view comments.', 'basic2col'); ?></p>
    	<?php return; endif; ?>
        
        <?php if ( $comments || comments_open() || pings_open() ) : ?>
        	<h3 id="comments-title">
                <!--<?php comments_rss_link('<img src="'. get_bloginfo('wpurl') .'/wp-includes/images/rss.png" alt="'.__('RSS Comments','basic2col').'" class="rssimg" />'); ?>-->
                <?php comments_number(__('There Are No Comments','basic2col'),__('There Is One Comment','basic2col'),__('There Are % Comments','basic2col') );?>
        	</h3>
        <?php endif; ?>
    
    
        <p class="small">
        	<?php if ( comments_open() ) : ?>
        		<a href="<?php the_permalink() ?>#postcomment" title="<?php _e('Write a comment to','basic2col'); ?> <?php the_title(); ?>">
        			<?php _e('Write comment','basic2col'); ?>
    			</a>
    		<?php endif; ?>
        		
        	<?php if ( pings_open() ) : ?>
        			- <a href="<?php trackback_url() ?>" rel="trackback" 
        			title="<?php _e('Trackback link to','basic2col'); ?> 
        			<?php the_title(); ?>"><?php _e('Trackback','basic2col'); ?></a>
        		<?php endif; ?>
        	<?php if (comments_open() || pings_open() ) : ?>
        	
        	<?php elseif ( ($comments) && (!comments_open() && !pings_open())  )  : ?>
        		<?php _e('Comments closed','basic2col'); ?>
        	<?php endif; ?>    
        </p>
    </div>


    <?php if ( $comments ) : ?>
        <ol id="commentlist">
        
        <?php foreach ($comments as $comment) : ?>
            <li id="comment-<?php comment_ID() ?>">
    
            	<?php if(function_exists('get_avatar')) {
            	 echo get_avatar( get_comment_author_email(), 40 ); 
            	} ?>
            
            	<div class="comment-header">
                	<span class="comment_author"><?php comment_type(__('Comment by ','basic2col'),__('Trackback from','basic2col'),__('Pingback from','basic2col')); ?> 
                		<cite><?php comment_author_link() ?></cite>
                	</span>
                	<span class="comment_time">
                	     
                        on <?php comment_date() ?> at
                		<a href="#comment-<?php comment_ID() ?>" title="Permalink to comment-<?php comment_ID() ?>">
                			<?php comment_time() ?>
                        </a> 
                		<?php edit_comment_link(__('Edit','basic2col'),' - ',''); ?>
                    </span>
                </div>
            
            	<div class="comment_text">
            		<?php comment_text() ?>
            	</div>
            
            	<?php if ($comment->comment_approved == '0') : ?>
                	<p class="approve"><?php echo basic2col_moderation_message(); ?></p>
            	<?php endif; ?>
            	<div class="clear"></div>
            </li>        
        <?php endforeach; ?>
        
        </ol>
        
        <?php else : // If there are no comments yet ?>
        	<?php if ('open' == $post->comment_status) : ?>
            	<p class="small"></p>
        	<?php endif; ?>
        <?php endif; ?>

        <?php if ('open' == $post->comment_status) : ?>
            <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            
                <p><?php _e('You have to be','basic2col'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in','basic2col'); ?></a> <?php _e('to post a comment','basic2col'); ?></p>
            <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <ul>
                    <?php if($user_ID) : ?>
                        <li>
                            <?php _e('You are logged in as','basic2col'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
                            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout"><?php _e('Logout','basic2col'); ?></a>
                        </li>
                    <?php else : ?>
                    
                    <li>
                        <label for="author"><?php _e('Name','basic2col'); ?></label>
                        <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
                    </li>
                    
                    <li>
                        <label for="email"><?php _e('Email','basic2col'); ?></label>
                        <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
                    </li>
                    
                    <li>
                        <label for="url"><?php _e('URL','basic2col'); ?> <small>(<?php _e('optional','basic2col');?>)</small></label>
                        <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
                    </li>
    
                    <?php endif; ?>
                    
                    <li>
                        <label for="comment"><?php _e('Your comment','basic2col'); ?></label>
                        <textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea>
                        <!--<small><strong>XHTML:</strong>  <?php echo allowed_tags(); ?></small>-->
                    </li>

                    <?php do_action('comment_form', $post->ID); ?>

                    <li>
                        <label>&nbsp;</label>
                        <input name="submit" type="submit" id="submit" tabindex="6" value="<?php _e('Submit','basic2col'); ?>" />
                        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                    </li>
                </ul>
            </form>

        <?php endif; // If registration required and not logged in ?>
    <?php endif; ?>
</div>
