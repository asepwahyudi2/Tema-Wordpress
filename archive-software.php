<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>
<?php game_repack_archive_header('fas fa-desktop', 'All Software', 'Kumpulan posting khusus software. Gunakan menu Software di dashboard untuk menambahkan software baru.'); ?>

<div class="archive-filter-bar" style="margin-bottom: 24px; display: flex; gap: 14px; flex-wrap: wrap; background: var(--bg-card); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border-color);">
    <input type="hidden" id="filter-post-type" value="software">
    <div class="filter-group" style="display: flex; flex-direction: column; gap: 6px;">
        <label for="filter-genre" style="font-size: 12px; font-weight: 700; color: var(--text-secondary);">CATEGORY</label>
        <select id="filter-genre" style="background: var(--bg-secondary); border: 1px solid var(--border-color); color: var(--text-primary); padding: 10px 14px; border-radius: var(--radius-sm); outline: none; font-size: 13px;">
            <option value="0">All Categories</option>
            <?php
            $cats = get_terms(array('taxonomy' => 'software_category', 'hide_empty' => true));
            if (!is_wp_error($cats) && !empty($cats)) {
                foreach ($cats as $cat) {
                    echo '<option value="' . esc_attr($cat->term_id) . '">' . esc_html($cat->name) . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="filter-group" style="display: flex; flex-direction: column; gap: 6px;">
        <label for="filter-sort" style="font-size: 12px; font-weight: 700; color: var(--text-secondary);">SORT BY</label>
        <select id="filter-sort" style="background: var(--bg-secondary); border: 1px solid var(--border-color); color: var(--text-primary); padding: 10px 14px; border-radius: var(--radius-sm); outline: none; font-size: 13px;">
            <option value="newest">Newest</option>
            <option value="popular">Most Viewed</option>
            <option value="alphabetical">A-Z</option>
        </select>
    </div>
</div>

<div id="ajax-filter-results">
<?php if (have_posts()) : ?>
<div class="games-grid software-grid">
    <?php while (have_posts()) : the_post(); game_repack_content_card(get_the_ID(), false); endwhile; ?>
</div>
<?php game_repack_pagination(); ?>
<?php else : ?>
<p class="empty-state">Belum ada software yang diposting.</p>
<?php endif; ?>
</div>
</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
