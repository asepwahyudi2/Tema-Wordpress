<?php get_header(); ?>
<div class="site-content">
<main class="main-content">

<section class="trending-section">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-fire"></i> Trending Games</h2>
        <a href="<?php echo esc_url(get_post_type_archive_link('game')); ?>" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="trending-grid">
        <?php
        $trending = new WP_Query(array(
            'post_type' => 'game',
            'posts_per_page' => 4,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'post_status' => 'publish',
        ));
        $rank = 1;
        if ($trending->have_posts()) :
            while ($trending->have_posts()) : $trending->the_post();
        ?>
        <div class="trending-card">
            <span class="trending-rank"><?php echo esc_html($rank); ?></span>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) { the_post_thumbnail('trending'); } else { echo '<div class="no-thumb"><i class="fas fa-gamepad"></i></div>'; } ?>
            </a>
            <div class="trending-overlay">
                <span class="category-badge"><?php echo esc_html(game_repack_get_primary_term_name(get_the_ID())); ?></span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
        </div>
        <?php $rank++; endwhile; wp_reset_postdata(); else : ?>
            <p class="empty-state">Belum ada game trending. Tambahkan posting dari menu <strong>Games</strong>.</p>
        <?php endif; ?>
    </div>
</section>

<section class="latest-games">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-gamepad"></i> Latest Games</h2>
        <a href="<?php echo esc_url(get_post_type_archive_link('game')); ?>" class="view-all">All Games <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="games-grid">
        <?php
        $paged = max(1, get_query_var('paged'));
        $games = new WP_Query(array(
            'post_type' => 'game',
            'posts_per_page' => 9,
            'paged' => $paged,
            'post_status' => 'publish',
        ));
        if ($games->have_posts()) :
            while ($games->have_posts()) : $games->the_post();
                game_repack_content_card(get_the_ID(), false);
            endwhile;
        else :
            echo '<p class="empty-state">Belum ada posting game.</p>';
        endif;
        ?>
    </div>
    <?php game_repack_pagination($games); wp_reset_postdata(); ?>
</section>

<section class="software-section">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-desktop"></i> Latest Software</h2>
        <a href="<?php echo esc_url(get_post_type_archive_link('software')); ?>" class="view-all">All Software <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="games-grid software-grid">
        <?php
        $software = new WP_Query(array(
            'post_type' => 'software',
            'posts_per_page' => 6,
            'post_status' => 'publish',
        ));
        if ($software->have_posts()) :
            while ($software->have_posts()) : $software->the_post();
                game_repack_content_card(get_the_ID(), false);
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="empty-state">Belum ada posting software. Tambahkan posting dari menu <strong>Software</strong>.</p>';
        endif;
        ?>
    </div>
</section>

<section class="news-section">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-newspaper"></i> Latest News</h2>
        <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="view-all">All News <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="games-grid news-grid">
        <?php
        $news_posts = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 6,
            'post_status' => 'publish',
        ));
        if ($news_posts->have_posts()) :
            while ($news_posts->have_posts()) : $news_posts->the_post();
                game_repack_content_card(get_the_ID(), false);
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="empty-state">Belum ada berita. Tambahkan posting dari menu <strong>News</strong>.</p>';
        endif;
        ?>
    </div>
</section>

<section class="tutorial-section">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-book-open"></i> Latest Tutorials</h2>
        <a href="<?php echo esc_url(home_url('/tutorial/')); ?>" class="view-all">All Tutorials <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="tutorial-list">
        <?php
        $tutorials = new WP_Query(array(
            'post_type' => 'tutorial',
            'posts_per_page' => 4,
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
                <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
            </div>
        </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <p class="empty-state">Belum ada tutorial. Buat post biasa dan masukkan ke kategori <strong>Tutorial</strong>.</p>
        <?php endif; ?>
    </div>
</section>


<section class="latest-post-section">
    <div class="section-header">
        <h2 class="section-title"><i class="fas fa-thumbtack"></i> Latest Posts</h2>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="view-all">All Posts <i class="fas fa-arrow-right"></i></a>
    </div>

    <div class="latest-post-grid">
        <?php
        $latest_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'post_status' => 'publish',
        ));

        if ($latest_posts->have_posts()) :
            while ($latest_posts->have_posts()) :
                $latest_posts->the_post();
                game_repack_content_card(get_the_ID(), false);
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="empty-state">Belum ada postingan dari menu <strong>Pos</strong>.</p>';
        endif;
        ?>
    </div>
</section>

</main>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
