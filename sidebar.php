<?php if ((is_archive() && !is_category()) || is_search()): ?>
    <!-- BY POST NAME OR BY POST DATE -->
<?php endif; ?>

<div class="secondary">
    <?php if ( is_home() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") )) : ?><?php endif;?>
</div>

<div class="secondary">
    <?php if ( is_page() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Page Sidebar") )) : ?><?php endif;?>
</div>

<div class="secondary">
    <?php if ( is_search() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Search Sidebar") )) : ?><?php endif;?>
</div>

<div class="secondary">
    <?php if ( is_archive() && (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Archive Sidebar") )) : ?><?php endif;?>
</div>
