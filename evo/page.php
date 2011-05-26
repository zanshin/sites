<?php get_header(); ?>
<div id="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- hide the_title
        <h1 class="page"><?php the_title(); ?></h1>
        -->
        <div class="pagecontent">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
		</div>
    		
        <?php endwhile; ?>
        
        <?php else : ?>
        
        <h1 class="page">We're sorry! We can't find the information you're looking for.</h1>
        <div class="pagecontent">
        <p>The article or blog post you are looking is not to be found. Please use the menu above to navigate to the page you are seeking, or try the site map link in the footer.</p>
        </div>
        <?php endif; ?>

    <div class="subnav">
    <ul>
       <?php simple_section_nav("<li>","</li>"); ?>
    </ul>
    <?php edit_post_link('(Edit)', '', ''); ?>
    </div>

    <?php get_sidebar(); ?>
    <div class="clr"></div>

</div>   
    <?php get_footer(); ?>