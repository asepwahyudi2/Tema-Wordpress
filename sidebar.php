<aside class="sidebar">
<div class="widget">
    <h3 class="widget-title"><i class="fas fa-gamepad"></i> Latest Games</h3>
    <?php $latest_games = new WP_Query(array('post_type'=>'game','posts_per_page'=>5,'post_status'=>'publish')); if ($latest_games->have_posts()) : while ($latest_games->have_posts()) : $latest_games->the_post(); ?>
    <div class="widget-latest-item">
        <?php if (has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php endif; ?>
        <div><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><span class="date"><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('M d, Y')); ?></span></div>
    </div>
    <?php endwhile; wp_reset_postdata(); else : ?><p style="color:var(--text-muted);font-size:13px;">Belum ada game.</p><?php endif; ?>
</div>

<div class="widget">
    <h3 class="widget-title"><i class="fas fa-desktop"></i> Latest Software</h3>
    <?php $latest_software = new WP_Query(array('post_type'=>'software','posts_per_page'=>5,'post_status'=>'publish')); if ($latest_software->have_posts()) : while ($latest_software->have_posts()) : $latest_software->the_post(); ?>
    <div class="widget-latest-item software-latest-item">
        <?php if (has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php endif; ?>
        <div><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><span class="date"><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('M d, Y')); ?></span></div>
    </div>
    <?php endwhile; wp_reset_postdata(); else : ?><p style="color:var(--text-muted);font-size:13px;">Belum ada software.</p><?php endif; ?>
</div>

<div class="widget">
    <h3 class="widget-title">Game Genres</h3>
    <ul class="widget-categories">
        <?php $genres = get_terms(array('taxonomy'=>'game_genre','hide_empty'=>false,'orderby'=>'count','order'=>'DESC')); if (!is_wp_error($genres) && $genres) : foreach ($genres as $genre) : ?>
        <li><a href="<?php echo esc_url(get_term_link($genre)); ?>"><?php echo esc_html($genre->name); ?><span class="count"><?php echo esc_html($genre->count); ?></span></a></li>
        <?php endforeach; else : ?><li><a href="<?php echo esc_url(admin_url('edit-tags.php?taxonomy=game_genre&post_type=game')); ?>">Tambah Game Genre<span class="count">0</span></a></li><?php endif; ?>
    </ul>
</div>

<div class="widget">
    <h3 class="widget-title">Software Categories</h3>
    <ul class="widget-categories software-categories">
        <?php $software_cats = get_terms(array('taxonomy'=>'software_category','hide_empty'=>false,'orderby'=>'count','order'=>'DESC')); if (!is_wp_error($software_cats) && $software_cats) : foreach ($software_cats as $cat) : ?>
        <li><a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?><span class="count"><?php echo esc_html($cat->count); ?></span></a></li>
        <?php endforeach; else : ?><li><a href="<?php echo esc_url(admin_url('edit-tags.php?taxonomy=software_category&post_type=software')); ?>">Tambah Software Category<span class="count">0</span></a></li><?php endif; ?>
    </ul>
</div>

<div class="widget">
    <h3 class="widget-title">Popular Tags</h3>
    <div class="widget-tags">
        <?php foreach (get_tags(array('orderby'=>'count','order'=>'DESC','number'=>15)) as $tag) : ?>
        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
        <?php endforeach; ?>
    </div>
</div>
<?php if (is_active_sidebar('main-sidebar')) { dynamic_sidebar('main-sidebar'); } ?>
</aside>
