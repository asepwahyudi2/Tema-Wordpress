<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="single-game">
    <div class="single-game-header">
        <?php if (has_post_thumbnail()) { the_post_thumbnail('game-detail'); } else { echo '<div class="no-thumb single-no-thumb"><i class="fas fa-gamepad"></i></div>'; } ?>
        <div class="single-game-header-overlay">
            <h1><?php the_title(); ?></h1>
            <?php game_repack_render_badges(get_the_ID(), 'single'); ?>
            <div class="single-game-meta">
                <span><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('F d, Y')); ?></span>
                <span><i class="fas fa-eye"></i> <?php echo esc_html(game_repack_format_count(game_repack_get_view(get_the_ID()))); ?> views</span>
                <span><i class="far fa-folder"></i> <?php echo esc_html(game_repack_get_primary_term_name(get_the_ID())); ?></span>
                <span><i class="far fa-comment"></i> <?php comments_number('0 Comments','1 Comment','% Comments'); ?></span>
                <?php if (function_exists('game_repack_render_favorite_button')) { echo '<span>'; game_repack_render_favorite_button(get_the_ID()); echo '</span>'; } ?>
            </div>
        </div>
    </div>
    <div class="single-game-body">
        <?php
        $fields = array('game_version'=>'Version','game_size'=>'File Size','game_developer'=>'Developer','game_publisher'=>'Publisher','game_release_date'=>'Release Date','game_genre'=>'Genre');
        $has_info = false;
        foreach ($fields as $key => $label) { if (get_post_meta(get_the_ID(), $key, true)) { $has_info = true; } }
        if ($has_info) : ?>
        <div class="game-info-box"><h3><i class="fas fa-info-circle"></i> Game Information</h3><div class="game-info-grid">
            <?php foreach ($fields as $key => $label) : $value = get_post_meta(get_the_ID(), $key, true); if ($value) : ?>
                <div class="game-info-item"><span class="label"><?php echo esc_html($label); ?></span><span class="value"><?php echo esc_html($value); ?></span></div>
            <?php endif; endforeach; ?>
        </div></div>
        <?php endif; ?>

        <?php game_repack_render_changelog(get_the_ID()); ?>
        <?php game_repack_render_rating(get_the_ID()); ?>

        <div class="post-content"><?php the_content(); ?></div>
        <?php game_repack_render_official_links(get_the_ID()); ?>
        <?php game_repack_social_share(); ?>

        <?php
        $reqs = array('req_min_os','req_min_cpu','req_min_ram','req_min_gpu','req_min_storage','req_rec_os','req_rec_cpu','req_rec_ram','req_rec_gpu','req_rec_storage');
        $has_req = false;
        foreach ($reqs as $key) { if (get_post_meta(get_the_ID(), $key, true)) { $has_req = true; } }
        if ($has_req) : ?>
        <div class="system-req"><h3><i class="fas fa-desktop"></i> System Requirements</h3><div class="req-columns">
            <div class="req-column"><h4>Minimum</h4><ul>
                <?php foreach (array('OS'=>'req_min_os','CPU'=>'req_min_cpu','RAM'=>'req_min_ram','GPU'=>'req_min_gpu','Storage'=>'req_min_storage') as $label => $key) : $value = get_post_meta(get_the_ID(), $key, true); if ($value) : ?>
                    <li><strong><?php echo esc_html($label); ?>:</strong> <?php echo esc_html($value); ?></li>
                <?php endif; endforeach; ?>
            </ul></div>
            <div class="req-column"><h4>Recommended</h4><ul>
                <?php foreach (array('OS'=>'req_rec_os','CPU'=>'req_rec_cpu','RAM'=>'req_rec_ram','GPU'=>'req_rec_gpu','Storage'=>'req_rec_storage') as $label => $key) : $value = get_post_meta(get_the_ID(), $key, true); if ($value) : ?>
                    <li><strong><?php echo esc_html($label); ?>:</strong> <?php echo esc_html($value); ?></li>
                <?php endif; endforeach; ?>
            </ul></div>
        </div></div>
        <?php endif; ?>

        <?php
        $dl1 = get_post_meta(get_the_ID(), 'download_link_1', true);
        $dl2 = get_post_meta(get_the_ID(), 'download_link_2', true);
        $dl3 = get_post_meta(get_the_ID(), 'download_link_3', true);
        if ($dl1 || $dl2 || $dl3) : 
        $safelink_ad = get_theme_mod('game_repack_safelink_before_download_ad_code');
        if ($safelink_ad) { echo '<div class="site-ad-before-download" style="background:var(--bg-secondary);border:1px solid var(--border-color);border-radius:var(--radius);padding:20px;text-align:center;margin-bottom:20px;">' . wp_kses_post(wpautop($safelink_ad)) . '</div>'; }
        ?>
        <div class="download-section"><h3><i class="fas fa-download"></i> Download <?php the_title(); ?></h3><div class="download-buttons">
            <?php if ($dl1) : ?><a href="<?php echo esc_url($dl1); ?>" class="btn-download direct" target="_blank" rel="nofollow noopener"><i class="fas fa-download"></i> Direct Download</a><?php endif; ?>
            <?php if ($dl2) : ?><a href="<?php echo esc_url($dl2); ?>" class="btn-download mirror" target="_blank" rel="nofollow noopener"><i class="fas fa-server"></i> Mirror Link</a><?php endif; ?>
            <?php if ($dl3) : ?><a href="<?php echo esc_url($dl3); ?>" class="btn-download torrent" target="_blank" rel="nofollow noopener"><i class="fas fa-magnet"></i> Torrent</a><?php endif; ?>
        </div></div>
        <?php endif; ?>

        <?php game_repack_render_disclaimer(); ?>
        <?php game_repack_render_report_button(get_the_ID()); ?>

        <?php $tags = get_the_tags(); if ($tags) : ?><div class="post-tags" style="margin-bottom:30px;"><div class="widget-tags"><?php foreach ($tags as $tag) : ?><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?></a><?php endforeach; ?></div></div><?php endif; ?>
    </div>
</article>
<?php
$terms = get_the_terms(get_the_ID(), 'game_genre');
if ($terms && !is_wp_error($terms)) :
    $term_ids = wp_list_pluck($terms, 'term_id');
    $related = new WP_Query(array(
        'post_type' => 'game',
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 3,
        'orderby' => 'rand',
        'tax_query' => array(array('taxonomy'=>'game_genre','field'=>'term_id','terms'=>$term_ids)),
    ));
    if ($related->have_posts()) : ?>
    <div class="related-games"><h3><i class="fas fa-gamepad"></i> Related Games</h3><div class="related-grid">
        <?php while ($related->have_posts()) : $related->the_post(); game_repack_content_card(get_the_ID(), false); endwhile; ?>
    </div></div>
    <?php wp_reset_postdata(); endif; endif; ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
