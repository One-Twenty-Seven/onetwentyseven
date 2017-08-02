<div class="secondary">
    <?php if ( is_home() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") )) : ?><?php endif;?>
</div>

<div class="secondary">
    <?php if ( is_category() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Category Sidebar") )) : ?><?php endif;?>
</div>

<div class="secondary">
    <?php if ( is_author() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Author Sidebar") )) : ?><?php endif;?>
</div>
