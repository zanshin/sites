    <div class="sidebars sidebarright">
        <div class="sidebar2">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Wide Sidebar') ) : ?>
            <div class="block">
                <h3>This is the wide sidebar</h3>
                <p>This is a great spot to put some information or a promotion. Use a "Text" widget in your "Wide Sidebar" sibebar options in Wordpress. Whatever you put in the title will show above and whatever you put as text (or html) will show right here!</p>
                <p>There are a total of 7 widget areas: Wide, Left and Right sidebars, along with footer widgets Footer1, Footer2, Footer3 and Footer4..</p>
            </div>
            <?php endif; ?>
        </div>
                
        <div class="sidebar3left">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
            <div class="block">
                <h3>Recent Posts</h3>
                    <?php query_posts('showposts=5'); ?>
                    <ul>
                        <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                        <?php endwhile;?>
                    </ul>
            </div>
            <div class="block">
                <h3>Recent Comments</h3>
                <ul id="recent_comments">
				<?php
				global $wpdb;
				$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID,
				SUBSTRING(comment_content,1,80) AS com_excerpt
				FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
				$wpdb->posts.ID)
				WHERE comment_approved = '1' AND comment_type = '' AND
				post_password = ''
				ORDER BY comment_date DESC
				LIMIT 4";
				$comments = $wpdb->get_results($sql);
				$output = $pre_HTML;
				foreach ($comments as $comment) {
				$output .= "\n<li><a href=\"" . get_permalink($comment->ID) .
				"#comment-" . $comment->comment_ID . "\" title=\"on " .
				$comment->post_title . "\">" .strip_tags($comment->com_excerpt).
				"</a> on <a href=\"" . get_permalink($comment->ID) . "\">" . $comment->post_title . "</a></li>";
				}
				$output .= $post_HTML;
				echo $output;?>
			</ul> <!-- END -->
			
			</div>
            <?php endif; ?>
        </div>
        
        <div class="sidebar3right">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
            <div class="block">
                <h3>Categories</h3>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
            </div>            
            <div class="block">
                <h3>Post Archives</h3>
                    <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                    </ul>
				</div>
            <?php endif; ?>
        </div>
    </div>