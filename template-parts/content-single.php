<?php
$post_format = get_post_format();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('t-single'); ?>>
        <?php the_content(); ?>
    </article>