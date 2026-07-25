<?php get_header(); ?>
<div class="site-content">
<main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php
$title = __('Archives', 'game-repack');
$icon = 'fas fa-archive';
$description = '';
if (is_category()) {
    $title = single_cat_title('', false);
    $icon = 'fas fa-folder';
    $description = category_description();
} elseif (is_tag()) {
    $title = single_tag_title('', false);
    $icon = 'fas fa-tag';
    $description = tag_description();
} elseif (is_date()) {
    $title = get_the_archive_title();
    $icon = 'fas fa-calendar';
} else {
    $title = get_the_archive_title();
}
game_repack_archive_header($icon, $title, $description);
?>
<?php if (have_posts()) : ?>
<div class="games-grid">
    <?php while (have_posts()) : the_post(); game_repack_content_card(get_the_ID(), true); endwhile; ?>
</div>
<?php game_repack_pagination(); ?>
<?php else : ?>
<p class="empty-state">No content found in this archive.</p>
<?php endif; ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
