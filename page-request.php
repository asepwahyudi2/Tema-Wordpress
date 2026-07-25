<?php
/* Template for Request page slug */
get_header(); ?>
<div class="site-content">
<main class="main-content">
<?php game_repack_breadcrumb(); ?>
<article class="single-game">
    <div class="single-game-body">
        <?php echo do_shortcode('[game_repack_request_form]'); ?>
    </div>
</article>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
