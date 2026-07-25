<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php $term = get_queried_object(); game_repack_archive_header('fas fa-folder-open', $term ? $term->name : 'Software Category', term_description()); ?>
<?php if (have_posts()) : ?>
<div class="games-grid software-grid">
    <?php while (have_posts()) : the_post(); game_repack_content_card(get_the_ID(), false); endwhile; ?>
</div>
<?php game_repack_pagination(); ?>
<?php else : ?>
<p class="empty-state">Belum ada software di kategori ini.</p>
<?php endif; ?>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
