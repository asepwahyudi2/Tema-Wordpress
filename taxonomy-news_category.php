<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php game_repack_archive_header('fas fa-newspaper', single_term_title('', false), term_description()); ?>
<?php if (have_posts()) : ?>
<div class="games-grid news-grid">
    <?php while (have_posts()) : the_post(); game_repack_content_card(get_the_ID(), false); endwhile; ?>
</div>
<?php game_repack_pagination(); ?>
<?php else : ?>
<p class="empty-state">Belum ada berita dalam kategori ini.</p>
<?php endif; ?>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
