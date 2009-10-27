<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<div id="content">

		<div class="billboard">
        <h3>Good place for slider or carousel, maybe?</h3>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        
        <div class="homepagecontent">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
        <?php edit_post_link('(Edit)', '', ''); ?>
		</div>
    		
        <?php endwhile; ?>
        
        <?php else : ?>
        
        <?php endif; ?>

    <div class="rssfeed">
                <h3><a href="blog/">Latest Blog Posts</a>&raquo;</h3>
                    <?php query_posts('showposts=5'); ?>
                    <ul>
                        <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>&raquo;</li>
                        <?php endwhile;?>
                    </ul>
  		</div> 

</div>   
    <?php get_footer(); ?>