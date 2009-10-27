<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h1 class="page">Search Results</h1>
				
			<div class="pagecontent">

            <?php while (have_posts()) : the_post(); ?>
				<h3 id="post-<?php the_ID(); ?>" class="top"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				
					<?php the_excerpt() ?>
		
				<p class="postmetadata">Posted in <?php the_category(', ') ?><strong> | </strong><?php edit_post_link('Edit','','<strong> | </strong>'); ?><?php comments_popup_link('No Comments&raquo;', 'One Comment&raquo;', '% Comments&raquo;'); ?></p> 
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
	
		<?php endwhile; ?>

		<div class="navigation">
            <div class="alignleft"><?php posts_nav_link('') ?></div>
            <!--edit in wp-includes/link-template.php-->
		</div>
	</div>
	<?php else : ?>
    <h1 class="page">Not Found</h1>
		<div class="pagecontent">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
	<?php endif; ?>
		
	
    <div class="subnav">
    </div>
</div>
<?php get_footer(); ?>