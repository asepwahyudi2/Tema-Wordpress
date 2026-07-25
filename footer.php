<footer class="site-footer">
<div class="footer-inner">
    <div class="footer-col">
        <h3><?php bloginfo('name'); ?></h3>
        <p><?php bloginfo('description'); ?></p>
        <p style="margin-top:10px;font-size:13px;color:var(--text-muted);">Website game, software, tutorial, dan informasi download resmi.</p>
        <div class="footer-social">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
            <a href="#" aria-label="Discord"><i class="fab fa-discord"></i></a>
            <a href="#" aria-label="Telegram"><i class="fab fa-telegram-plane"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="footer-col">
        <h3>Menu Utama</h3>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-angle-right"></i> Home</a></li>
            <li><a href="<?php echo esc_url(get_post_type_archive_link('game')); ?>"><i class="fas fa-angle-right"></i> Games</a></li>
            <li><a href="<?php echo esc_url(get_post_type_archive_link('software')); ?>"><i class="fas fa-angle-right"></i> Software</a></li>
            <li><a href="<?php echo esc_url(home_url('/tutorial/')); ?>"><i class="fas fa-angle-right"></i> Tutorial</a></li>
            <li><a href="<?php echo esc_url(home_url('/request/')); ?>"><i class="fas fa-angle-right"></i> Request</a></li>
            <li><a href="<?php echo esc_url(home_url('/dmca/')); ?>"><i class="fas fa-angle-right"></i> DMCA</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><i class="fas fa-angle-right"></i> Contact</a></li>
        </ul>
    </div>
    <div class="footer-col">
        <h3>Info Website</h3>
        <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            'container'      => false,
            'fallback_cb'    => 'game_repack_default_footer_menu',
        )); ?>
    </div>
</div>
<div class="footer-bottom"><p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All Rights Reserved. | Powered by WordPress</p></div>
</footer>
<button class="scroll-top" aria-label="Scroll to top"><i class="fas fa-chevron-up"></i></button>
<div class="lightbox-overlay"><img src="" alt="Lightbox Image"></div>
<?php wp_footer(); ?>
</body></html>
