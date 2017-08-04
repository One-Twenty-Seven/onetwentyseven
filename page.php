<?php

get_header();

?>

<div class="max-width-wrapper">
    <div class="content">
        <div class="primary">
            <div class="entry-content">
                <?php
                while ( have_posts() ) : the_post();
                    if ( get_the_title() == "Masthead" ) { ?>
                        <div class="masthead-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/SmallLogoPNG.png" width="25" alt="">
                            <h2><strong>Masthead</strong></h2>
                            <div class="masthead-names">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    <?php
                    } else {

                        the_content();

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    }
                endwhile; // End of the loop.
                ?>
            </div>
        </div>
        <div class="secondary">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();

?>
