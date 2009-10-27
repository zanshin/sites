    <div class="footer clr">
        <div class="leftfoot">
            <div class="footer1">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footbar1') ) : ?>
                <h3>Another Blurb, Or Nutshell...</h3>
                <p>This is a great spot to put a small blurb with some information on what your blog is all about. Use a "Text" widget in your "Footbar1" sibebar options in Wordpress.</p>
                <?php endif; ?>
            </div>
            <div class="footer2">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footbar2') ) : ?>
                <h3>What we're talking about on our blog:</h3>
                <?php wp_tag_cloud('smallest=8&largest=15&'); ?>
                <?php endif; ?>
            </div>
            <div class="clr"></div>
        </div>
        <div class="rightfoot">
        	<div class="footer3">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footbar3') ) : ?>
            <h3><a href="/site-map/">Site Map</a> | <a href="/terms/">Terms</a> | <a href="/colophon/">Colophon</a></h3>
            <p>&copy;2009<?php echo (date('Y') != 2009) ? '-'.date('Y') : ''; ?>, <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name');?></a>; All Rights Reserved.<br />
<?php wp_loginout(); ?> | <a href="<?php bloginfo('url'); ?>/wp-admin/">Site Admin</a></p>
			<?php endif; ?>
            </div>
            <div class="footer4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footbar4') ) : ?>
                <h3>Company Name</h3>
                <p>123 Main Street<br />
                Some City, ST 12345<br />
                123-456-7890 voice<br />
                123-456-7899 fax</p>
                <?php endif; ?>
            </div>
        <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
    
</div>
</body>
</html>