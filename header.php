<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="max-width-wrapper">
            <header>
                <div class="site-logo-padding">
                    <div class="site-logo-text">
                        <a title="<?php echo get_bloginfo( 'name' ); ?>" href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
                    </div>
                    <div class="site-logo-sponsor">
                        <script>
                            function submitForm(e) {
                                if ( document.forms["searchform"]["s"].value.length > 0 ) {
                                    document.forms["searchform"].submit();
                                }
                                else {
                                    document.forms["searchform"]['s'].parentNode.classList.toggle("open");
                                }
                                return false;
                            }

                            function toggleMobileMenu(e) {
                                e.classList.toggle("open");
                                document.getElementById("retractNav").classList.toggle("open");
                            }
                        </script>
                        <div class="flex">
                            <form role="search" onsubmit="submitForm()" method="get" id="searchform" class="searchform" action="/">
                                <div id="search-form-input-wrapper" class="search-form-input-wrapper">
                                    <input type="text" placeholder="Search" value="" name="s" id="s">
            					</div>
                                <button onclick="submitForm(this)" type="button" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
                			</form>
                            <button onclick="toggleMobileMenu(this)" class="retract-nav-button">Menu</button>
                        </div>
                    </div>
                </div>
                <div id="retractNav" class="retract-nav">
                    <nav>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'nav-primary'
                        ]);
                        ?>
                    </nav>
                </div>
            </header>
        </div>
