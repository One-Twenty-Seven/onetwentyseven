<?php get_header(); ?>

<div class="max-width-wrapper">
    <div class="content">
        <div class="primary">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-ab single-post-container">
                <div class="post-info">
                    <p class="topic"><?php echo the_time('M. j, Y'); ?> at <?php the_time('g:i A'); ?></p>
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    <div class="metadata-area">
                        <p class="single-metadata">By <?php the_author_posts_link(); ?></p>
                        <p class="single-metadata">Posted under <?php echo get_the_category_list(", "); ?></p>
                    </div>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <?php $image_info = get_post( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )->post_excerpt; ?>
                    <figure class="single-post-feature-image">
                        <div class="thumbnail-image feature-thumbnail" style="background-image: url(<?php echo $image[0]; ?>)"></div>
                        <?php if ($image_info) { ?><figcaption><?php echo $image_info; ?></figcaption><?php } ?>
                    </figure>
                    <div class="entry-content">
                         <?php the_content(); ?>
                    </div>
                    <div class="metadata-area">
                        <p class="mini-bio">
                            <?php if (get_the_author_meta('description')) { ?>
                                <?php echo get_the_author_meta('description'); ?>
                            <?php } else { echo the_author_posts_link() . ' is a writer for ' . get_bloginfo( 'title' ); } ?>
                            <span><a href=""><i class="fa fa-envelope" aria-hidden="true"></i></a></span>
                            <?php if (get_the_author_meta('twitter')) { ?>
                                <span><a href="https://twitter.com/<?php echo get_the_author_meta('twitter'); ?>"><i style="margin-right: 4px;" class="fa fa-twitter" aria-hidden="true"></i>@<?php echo get_the_author_meta('twitter'); ?></a></span>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
