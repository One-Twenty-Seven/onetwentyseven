<?php
// Creating the widget
class recent_contributors_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'recent_contributors_widget',

// Widget name will appear in UI
__('Recent Contributors', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Will display recent contributors.', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$contribs = apply_filters( 'widget_title', $instance['contribs'] );

// before and after widget arguments are defined by themes
if ( ! empty( $contribs ) ) ?>

    <h2 class="section-title" style="margin-bottom: 0;">Recent Contributors</h2>

    <?php
    // This is where you run the code and display the output
    $recent_posts = wp_get_recent_posts();
    $i = 0;
    $recent_contribs = array();
	foreach( $recent_posts as $recent ){
        if ($i == $contribs) break;
		if ( array_key_exists($recent["post_author"], $recent_contribs)) continue;

        $recent_contribs[$recent["post_author"]] = 1; ?>

        <div class="hentry secondary-entry contributors-wrapper">
            <div class="post-info">
                <h2 class="article-title">
                    <a href="<?php echo get_author_posts_url( get_userdata($recent['post_author'])->ID ); ?>">
                        <?php echo get_userdata($recent['post_author'])->display_name; ?>
                    </a>
                </h2>
                <p class="byline">
                    <?php echo get_user_meta($recent["post_author"], 'job_title', true); ?>
                </p>
            </div>
            <?php if (get_userdata($recent["post_author"])->user_url) { ?><a class="thumbnail-link" href="<?php echo get_userdata($recent["post_author"])->user_url; ?>"><?php } ?>
                <img class="thumbnail-image" src="<?php echo get_wp_user_avatar_src($recent["post_author"]); ?>" alt="">
            <?php if (get_userdata($recent["post_author"])->user_url) { ?></a>><?php } ?>
        </div>

        <?php
        // echo '<li>' . get_wp_user_avatar_src($recent["post_author"]) . '</li>';

        $i++;
	}
	wp_reset_query();

}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'contribs' ] ) ) {
    $contribs = $instance[ 'contribs' ];
}
else {
    $contribs = __( '0', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'contribs' ); ?>"><?php _e( 'Contributors to list:' ); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id( 'contribs' ); ?>" name="<?php echo $this->get_field_name( 'contribs' ); ?>">
    <?php global $wpdb; $author_ids = $wpdb->get_col("SELECT `post_author` FROM
    (SELECT `post_author`, COUNT(*) AS `count` FROM {$wpdb->posts}
        WHERE `post_status`='publish' GROUP BY `post_author`) AS `stats`
    WHERE `count` >= 1 ORDER BY `count` DESC;"); ?>
    <? for ($i=0; $i<count($author_ids); $i++) { ?>
        <option <?php if ($i == $contribs) {?>selected<?php } ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
    <?php } ?>
</select>
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['contribs'] = ( ! empty( $new_instance['contribs'] ) ) ? strip_tags( $new_instance['contribs'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
