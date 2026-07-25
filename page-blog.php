<?php get_header(); ?>
<div class="site-content">
<main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php game_repack_archive_header('fas fa-thumbtack', 'Latest Posts', 'Postingan terbaru dari menu Pos WordPress.'); ?>

<div class="games-grid latest-post-grid">
<?php
$paged = max(1, get_query_var('paged'));
$blog_posts = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged,
    'post_status' => 'publish',
));

if ($blog_posts->have_posts()) :
    while ($blog_posts->have_posts()) : $blog_posts->the_post();
        game_repack_content_card(get_the_ID(), false);
    endwhile;
    wp_reset_postdata();
else :
    echo '<p class="empty-state">Belum ada postingan dari menu <strong>Pos</strong>.</p>';
endif;
?>
</div>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
