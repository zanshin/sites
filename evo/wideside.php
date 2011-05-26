<?php
/*
Template Name: Widesidebar
*/
?>
<?php get_header(); ?>
<div id="content">
    <div class="blogmain">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="article">
           <!--
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <p class="extendspost"> Author: <?php the_author_posts_link(); ?>; Published: <?php the_time('M j, Y'); ?>; Category: <?php the_category(', ') ?>; <?php if ( has_tag() ) { the_tags('Tags: ', ', ', ''); } else { ?>Tags: <a href="<?php the_permalink(); ?>">None</a><?php } ?>; <?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?> <?php edit_post_link('(Edit)', '', ''); ?></p>
            -->
            
            <?php the_content('Read the rest of this entry &raquo;'); ?>
            </div>
            <!--
            <?php comments_template(); ?>
	    -->	
    <?php endwhile; ?>

    <div class="navigation">
        <div class="right"><?php next_posts_link('Older Entries&raquo;') ?></div>
        <div class="left"><?php previous_posts_link('&laquo;Newer Entries') ?></div>
    </div>
    
    <?php else : ?>
    <div class="article">
        <h1>We're sorry! We can't find the information you're looking for.</h1>
        <p>The article or blog post you are looking is not to be found. Please use the menu above to navigate to the page you are seeking, or try the site map link in the footer.</p>
        </div>
    <?php endif; ?>
    
    </div>

    <?php get_sidebar(); ?>
    
    <div class="clr"></div>
</div>    
    <?php get_footer(); ?>