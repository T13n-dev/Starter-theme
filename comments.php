<?php
/**
 * The template for displaying comments
 *
 * @package tstarter
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>

<div id="t-comments" class="t-comments">

	<?php if ( have_comments() ) : ?>
		<h2 class="t-comments__title">
			<?php
			$comments_number = get_comments_number();
			if ( 1 === (int) $comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'understrap' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						THEME_DOMAIN
					) ),
					number_format_i18n( $comments_number ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="t-comments__listCmt">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 42,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="t-comments__no-comments"><?php _e( 'Comments are closed.', THEME_DOMAIN ); ?></p>
	<?php endif; ?>

	<?php
		comment_form(
			array(
				'title_reply_before' => '<h2 class="t-comments__reply-title">',
				'title_reply_after'  => '</h2>',
			)
		);
		?>

</div><!-- .comments-area -->
