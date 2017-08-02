<?php get_header(); ?>

<div class="max-width-wrapper">
    <div class="content">

        <?php if (have_posts()): ?>

                    <div class="primary">
                        <div class="page-header">
                            <h1 class="page-title">
                                <span>All Posts By</span>
                                <?php the_author(); ?>
                            </h1>
                        </div>
                        <div class="slats" style="min-height: 0;">
                            <div class="slat-photo-author">
                                <a class="full-extend" href="<?php echo get_permalink(); ?>">
                                    <div style="background-image: url(<?php echo get_wp_user_avatar_src($recent["post_author"]); ?>); background-size: cover; background-repeat: no-repeat; height: 100%; width: 100%;"></div>
                                </a>
                            </div>
                            <div class="slat-contents">
                                <div class="mini-bio">
                                    <h4 style="display: inline-block; font-style: normal;"><?php echo get_the_author_meta('display_name'); ?></h4>
                                    <span><a href="mailto:<?php echo get_the_author_meta('email'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></span>
                                    <?php if (get_the_author_meta('twitter')) { ?>
                                        <span><a href="https://twitter.com/<?php echo get_the_author_meta('twitter'); ?>"><i style="margin-right: 4px;" class="fa fa-twitter" aria-hidden="true"></i>@<?php echo get_the_author_meta('twitter'); ?></a></span>
                                    <?php } ?><br>
                                    <?php if (get_the_author_meta('description')) { ?>
                                        <?php echo get_the_author_meta('description'); ?>
                                    <?php } else { echo the_author_posts_link() . ' is a writer for ' . get_bloginfo( 'title' ); } ?>
                                </div>
                            </div>
                        </div>
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
                    </div> <!-- primary-->

                    <?php get_sidebar(); ?>

        <?php else : ?>

        	<h1>No Posts Yet From This Author</h1>

        <?php endif; ?>

    </div> <!-- content -->
</div> <!-- max-width-wrapper -->

<?php get_footer(); ?>
