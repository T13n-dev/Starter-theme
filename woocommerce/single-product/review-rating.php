<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $comment;
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

if ( $rating && wc_review_ratings_enabled() ) {
	echo wc_get_rating_html( $rating ); // WPCS: XSS ok.
}
