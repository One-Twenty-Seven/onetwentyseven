<?php
// Creating the widget
class random_post_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'random_post_widget',

            // Widget name will appear in UI
            __('Random Post', 'wpb_widget_domain'),

            // Widget description
            array( 'description' => __( 'Randomly select a post to display.', 'wpb_widget_domain' ), )
        );
    }

        // Creating widget front-end

    public function widget( $args, $instance ) {
        $contribs = apply_filters( 'widget_title', $instance['contribs'] );

        // before and after widget arguments are defined by themes
        if ( ! empty( $contribs ) ) ?>

            <h2 class="section-title" style="margin-bottom: 0;">You may also like...</h2>

            <?php
            //Create WordPress Query with 'orderby' set to 'rand' (Random)
            $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
            // output the random post
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="hentry feature sidebar-post">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="thumbnail-image sidebar-thumbnail" style="background-image: url(<?php echo $image; ?>)"></div>
                    </a>
                <?php endif; ?>
                <div class="post-info">
                    <h2 class="article-title">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="byline">
                        Posted under <?php echo get_the_category_list(", "); ?>
                    </p>
                </div>
            </div>

            <?php endwhile;

            // Reset Post Data
            wp_reset_postdata();

    }

    // Widget Backend
    public function form( $instance ) {
    ?>
    <br>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

    }

} // Class wpb_widget ends here
