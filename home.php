<?php get_header(); ?>

<div class="max-width-wrapper">
    <div class="content">

        <?php if (have_posts()): ?>

                    <div class="primary">
                        <div class="row-ab">

                                <?php $count = 1; ?>
                                <?php $total_posts = wp_count_posts()->publish; ?>
                                <?php while (have_posts()) : the_post(); ?>
                                	<?php if ($count == 1): ?>
                                        <div class="col-a">

                                            <!-- FEATURED POST -->
                                            <div class="hentry feature">
                                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
                                                    <a href="<?php echo get_permalink(); ?>">
                                                        <div class="thumbnail-image feature-thumbnail" style="background-image: url(<?php echo $image; ?>)"></div>
                                                    </a>
                                                <?php endif; ?>
                                                <div class="post-info">
                                                    <p class="topic">
                                                        <?php echo get_the_category()[0]->cat_name; ?>
                                                    </p>
                                                    <h2 class="article-title">
                                                        <a href="<?php echo get_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>
                                                    <p class="byline">
                                                        By <a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- END FEATURED POST -->

                                        <!-- div --> <?php if ($total_posts == 1): ?></div><?php endif; ?>
                                    <?php elseif ($count > 1 && $count < 4): ?>

                                        <!-- SECONDARY POST -->
                                        <div class="hentry secondary-entry">
                                            <div class="post-info">
                                                <p class="topic">
                                                    <?php echo get_the_category()[0]->cat_name; ?>
                                                </p>
                                                <h2 class="article-title">
                                                    <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                                </h2>
                                                <p class="byline">
                                                    By <a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
                                                </p>
                                            </div>
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
                                                <a class="thumbnail-link" href="<?php echo get_permalink(); ?>">
                                                    <div class="thumbnail-image" style="background-image: url(<?php echo $image; ?>)"></div>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <!-- END SECONDARY POST -->

                                        <!-- div --> <?php if ($total_posts == $count || $count == 3): ?></div><?php endif; ?>
                                    <?php elseif ($count < 11): ?>
                                        <? if ($count == 4): ?>
                                            <div class="col-b">
                                                <h2 class="section-title">The Latest</h2>
                                        <?php endif; ?>

                                                <div class="section-story">
                                                    <p class="topic"><?php the_time('M j') ?></p>
                                                    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>

                                            <!-- div --> <?php if ($total_posts == $count || $count == 10): ?>
                                                            <div class="button-container">
                                                                <a class="button" href="<?php echo get_year_link('');  ?>">See All</a>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                    <?php else: break; ?>

                                    <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endwhile; ?>

                        </div> <!-- row-ab -->
                    </div> <!-- primary-->

                    <?php get_sidebar(); ?>

        <?php else : ?>

        	<h1>No Posts Yet</h1>

        <?php endif; ?>

    </div> <!-- content -->
</div> <!-- max-width-wrapper -->

<?php get_footer(); ?>
