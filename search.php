<?php get_header(); ?>
<div class="site-content">
<main class="main-content">
<div class="search-header">
    <h1><i class="fas fa-search"></i> Search Results</h1>
    <p>Showing results for: <strong>"<?php echo esc_html(get_search_query()); ?>"</strong></p>
    <p style="margin-top:5px;color:var(--text-muted);"><?php global $wp_query; echo esc_html($wp_query->found_posts); ?> results found across articles, games, and software</p>
</div>
<?php if (have_posts()) : ?>
<div class="games-grid">
    <?php while (have_posts()) : the_post(); game_repack_content_card(get_the_ID(), true); endwhile; ?>
</div>
<?php game_repack_pagination(); ?>
<?php else : ?>
<div class="error-404" style="padding:40px;">
    <h2>No Results Found</h2>
    <p>Sorry, no content matched your search. Try different keywords.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home"><i class="fas fa-home"></i> Back to Home</a>
</div>
<?php endif; ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
