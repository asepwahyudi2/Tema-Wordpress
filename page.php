<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); if(have_posts()): while(have_posts()): the_post(); ?>
<article class="single-game"><div class="single-game-body"><h1 style="font-size:28px;margin-bottom:20px;"><?php the_title(); ?></h1><div class="post-content"><?php the_content(); ?></div></div></article>
<?php if(comments_open() || get_comments_number()) comments_template(); endwhile; endif; ?>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
