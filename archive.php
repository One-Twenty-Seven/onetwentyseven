<?php get_header(); ?>

<div class="max-width-wrapper">
    <div class="content">

        <?php if (have_posts()): ?>

                    <div class="primary">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="slats">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <div class="slat-photo">
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
                                        <a class="full-extend" href="<?php echo get_permalink(); ?>">
                                            <div style="background-image: url(<?php echo $image; ?>); background-size: cover; background-repeat: no-repeat; height: 100%; width: 100%;"></div>
                                        </a>
                                    </div>
                                <? endif; ?>
                                <div class="slat-contents">
                                    <p class="topic"><?php echo the_time('M. j, Y'); ?></p>
                                    <h3 style="margin-top:0;">
                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="metadata-area">
                                        <p class="single-metadata">By <?php the_author_posts_link(); ?></p>
                                        <p class="single-metadata">Posted under <?php echo get_the_category_list(", "); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <div class="pagination-buttons">
                            <?php $year = get_query_var('year'); ?>
                            <?php $backQuery = new WP_Query( ["date_query" => [ ["year" => $year + 1] ]] ); ?>
                            <?php $nextQuery = new WP_Query( ["date_query" => [ ["year" => $year - 1] ]] ); ?>
                            <div style="text-align: right;">
                                <a <?php if (!$backQuery->have_posts()): ?>disabled<?php endif; ?> href="<?php echo get_year_link( $year + 1 ); ?>">Back</a>
                            </div>
                            <div style="text-align: left;">
                                <a <?php if (!$nextQuery->have_posts()): ?>disabled<?php endif; ?> href="<?php echo get_year_link( $year - 1 ); ?>">Next</a>
                            </div>
                        </div>
                    </div> <!-- primary-->

                    <?php get_sidebar(); ?>

        <?php else : ?>

        	<h1>No Results Could Be Found</h1>

        <?php endif; ?>

    </div> <!-- content -->
</div> <!-- max-width-wrapper -->

<?php get_footer(); ?>
