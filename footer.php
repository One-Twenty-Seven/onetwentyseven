        <footer>
            <div class="max-width-wrapper">
                <div class="footer-section-above">
                    <div class="footer-section-get-more">
                        Get More <?php echo get_bloginfo( 'title' ); ?>...
                    </div>
                    <div class="footer-section-social">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com/127DU/&width=73&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21&appId" width="73" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        <iframe src="https://platform.twitter.com/widgets/follow_button.html?screen_name=127denison&show_screen_name=true&show_count=false&size=n" title="Follow One Twenty Seven on Twitter" height="20" width="140" style="border: 0; overflow: hidden;"></iframe>
                    </div>
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer-primary'
                ]);
                ?>
                <p class="watermark-in-footer"><?php echo base64_decode("PGEgaHJlZj0iaHR0cHM6Ly93b3JkcHJlc3MuY29tLyI+V29yZHByZXNzPC9hPiB0aGVtZSBkZXZlbG9wZWQgYnkgPGEgaHJlZj0iaHR0cHM6Ly9ib2JieWxjcmFpZy5jb20iPkJvYmJ5IEwuIENyYWlnPC9hPg=="); ?>
                    <?php if (is_user_logged_in()): ?>
                        <a class="login-button" href="/wp-admin">Dashboard</a></p>
                    <?php else: ?>
                        <a class="login-button" href="<?php echo wp_login_url(); ?>">Login</a></p>
                    <?php endif; ?>
            </div>
        </footer>
    </body>
</html>
