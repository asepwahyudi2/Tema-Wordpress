<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="single-game article-single">
    <?php if (has_post_thumbnail()) : ?>
    <div class="single-game-header">
        <?php the_post_thumbnail('game-detail'); ?>
        <div class="single-game-header-overlay">
            <h1><?php the_title(); ?></h1>
            <div class="single-game-meta">
                <span><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('F d, Y')); ?></span>
                <span><i class="fas fa-eye"></i> <?php echo esc_html(game_repack_format_count(game_repack_get_view(get_the_ID()))); ?> views</span>
                <span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
                <span><i class="far fa-comment"></i> <?php comments_number('0 Comments','1 Comment','% Comments'); ?></span>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="single-game-body">
        <?php if (!has_post_thumbnail()) : ?>
            <h1 style="font-size:32px;margin-bottom:10px;"><?php the_title(); ?></h1>
            <div class="single-game-meta" style="margin-bottom:25px;">
                <span><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('F d, Y')); ?></span>
                <span><i class="fas fa-eye"></i> <?php echo esc_html(game_repack_format_count(game_repack_get_view(get_the_ID()))); ?> views</span>
                <span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
            </div>
        <?php endif; ?>
        <div class="post-content"><?php the_content(); ?></div>
        <?php game_repack_social_share(); ?>
        <?php $tags = get_the_tags(); if ($tags) : ?><div class="post-tags" style="margin-bottom:30px;"><div class="widget-tags"><?php foreach ($tags as $tag) : ?><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?></a><?php endforeach; ?></div></div><?php endif; ?>
    </div>
</article>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
