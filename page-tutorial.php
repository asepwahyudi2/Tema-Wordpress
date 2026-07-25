<?php get_header(); ?>
<div class="site-content">
<main class="main-content">
<?php game_repack_breadcrumb(); ?>
<div class="section-header">
    <h2 class="section-title"><i class="fas fa-book-open"></i> Tutorial</h2>
</div>
<div class="archive-description">
    <p>Panduan install, fix error, optimasi game, cara pakai software, dan tutorial PC lainnya.</p>
</div>
<div class="tutorial-list tutorial-archive-list">
<?php
$paged = max(1, get_query_var('paged'));
$tutorials = new WP_Query(array(
    'post_type' => 'tutorial',
    'posts_per_page' => 10,
    'paged' => $paged,
    'post_status' => 'publish',
));
if ($tutorials->have_posts()) :
    while ($tutorials->have_posts()) : $tutorials->the_post();
?>
    <article class="tutorial-card">
        <div class="tutorial-icon"><i class="fas fa-screwdriver-wrench"></i></div>
        <div>
            <span class="tutorial-date"><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('M d, Y')); ?></span>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 26)); ?></p>
        </div>
    </article>
<?php
    endwhile;
else :
    echo '<p class="empty-state">Belum ada tutorial. Buat post biasa dan masukkan ke kategori <strong>Tutorial</strong>.</p>';
endif;
?>
</div>
<?php game_repack_pagination($tutorials); wp_reset_postdata(); ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
