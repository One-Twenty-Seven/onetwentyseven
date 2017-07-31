<?php
get_header();

if (have_posts()): while (have_posts()) : the_post();

    the_title();
    echo '<br>';

endwhile;
endif;

get_footer();
