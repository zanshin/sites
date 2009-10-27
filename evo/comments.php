<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
    $oddcomment = 'alt';
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="navigation">
		<div class="left"><?php previous_comments_link() ?></div>
		<div class="right"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?> <?php if ( $comment->comment_author_email == get_the_author_email() & $oddcomment == 'alt' ) echo 'altauthorcomment'; elseif ( $comment->comment_author_email == get_the_author_email() & $oddcomment != 'alt' ) echo 'authorcomment';?>" id="comment-<?php comment_ID() ?>">
            <p class="commentauthor">
			<?php echo get_avatar( $comment, $size = '48' ); ?><br/>
			<strong><?php comment_author_link() ?></strong><br/>
            <?php comment_date('M j, Y') ?><br/>
            <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>:&nbsp;<?php edit_comment_link('(Edit)','',''); ?>
            </p>
            <?php if ($comment->comment_approved == '0') : ?>
			<p><em>Your comment is awaiting moderation.</em></p>
			<?php endif; ?>
			<div class="comment"><?php comment_text() ?></div>
		<div class="clr"></div>		
		</li>	
        <?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'alt' : '';
	?>

	
	<?php endforeach; ?>
		
	</ol>

	<div class="navigation">
		<div class="left"><?php previous_comments_link() ?></div>
		<div class="right"><?php next_comments_link() ?></div>
	</div>
 <?php else : ?>

	<?php if ('open' == $post->comment_status) : ?>

	 <?php else :?>
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<h3><?php comment_form_title( 'Leave a comment', 'Leave a comment to %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a>&raquo;</p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author">Name<?php if ($req) echo "*"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email">Mail<?php if ($req) echo "*"; ?> <span class="small">(will not be published)</span></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url">Website</label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="75%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif;?>
</div>

<?php endif; ?>
