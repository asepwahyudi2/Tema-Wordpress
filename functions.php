<?php
if (!defined('ABSPATH')) { exit; }

define('GAME_REPACK_VERSION', '1.4.4');

function game_repack_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(600, 400, true);
    add_image_size('game-card', 400, 250, true);
    add_image_size('trending', 600, 350, true);
    add_image_size('game-detail', 1200, 500, true);
    add_theme_support('html5', array('search-form','comment-list','gallery','caption','style','script'));
    add_theme_support('custom-logo', array('height'=>50,'width'=>200,'flex-height'=>true,'flex-width'=>true));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'game-repack'),
        'footer'  => __('Footer Menu', 'game-repack'),
    ));
}
add_action('after_setup_theme', 'game_repack_setup');

function game_repack_register_content_types() {
    register_post_type('game', array(
        'labels' => array(
            'name' => __('Games', 'game-repack'),
            'singular_name' => __('Game', 'game-repack'),
            'menu_name' => __('Games', 'game-repack'),
            'add_new_item' => __('Add New Game', 'game-repack'),
            'edit_item' => __('Edit Game', 'game-repack'),
            'new_item' => __('New Game', 'game-repack'),
            'view_item' => __('View Game', 'game-repack'),
            'search_items' => __('Search Games', 'game-repack'),
            'not_found' => __('No games found', 'game-repack'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'games', 'with_front' => false),
        'menu_icon' => 'dashicons-games',
        'supports' => array('title','editor','thumbnail','excerpt','comments','author'),
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
    ));

    register_taxonomy('game_genre', array('game'), array(
        'labels' => array(
            'name' => __('Game Genres', 'game-repack'),
            'singular_name' => __('Game Genre', 'game-repack'),
            'menu_name' => __('Game Genres', 'game-repack'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'game-genre', 'with_front' => false),
        'show_in_rest' => true,
    ));

    register_post_type('software', array(
        'labels' => array(
            'name' => __('Software', 'game-repack'),
            'singular_name' => __('Software', 'game-repack'),
            'menu_name' => __('Software', 'game-repack'),
            'add_new_item' => __('Add New Software', 'game-repack'),
            'edit_item' => __('Edit Software', 'game-repack'),
            'new_item' => __('New Software', 'game-repack'),
            'view_item' => __('View Software', 'game-repack'),
            'search_items' => __('Search Software', 'game-repack'),
            'not_found' => __('No software found', 'game-repack'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'software', 'with_front' => false),
        'menu_icon' => 'dashicons-desktop',
        'supports' => array('title','editor','thumbnail','excerpt','comments','author'),
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
    ));

    register_taxonomy('software_category', array('software'), array(
        'labels' => array(
            'name' => __('Software Categories', 'game-repack'),
            'singular_name' => __('Software Category', 'game-repack'),
            'menu_name' => __('Software Categories', 'game-repack'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'software-category', 'with_front' => false),
        'show_in_rest' => true,
    ));

    register_post_type('news', array(
        'labels' => array(
            'name' => __('News', 'game-repack'),
            'singular_name' => __('News', 'game-repack'),
            'menu_name' => __('News', 'game-repack'),
            'add_new' => __('Add News', 'game-repack'),
            'add_new_item' => __('Add New News', 'game-repack'),
            'edit_item' => __('Edit News', 'game-repack'),
            'new_item' => __('New News', 'game-repack'),
            'view_item' => __('View News', 'game-repack'),
            'search_items' => __('Search News', 'game-repack'),
            'not_found' => __('No news found', 'game-repack'),
            'all_items' => __('All News', 'game-repack'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news', 'with_front' => false),
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array('title','editor','thumbnail','excerpt','comments','author'),
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
    ));

    register_taxonomy('news_category', array('news'), array(
        'labels' => array(
            'name' => __('News Categories', 'game-repack'),
            'singular_name' => __('News Category', 'game-repack'),
            'menu_name' => __('News Categories', 'game-repack'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'news-category', 'with_front' => false),
        'show_in_rest' => true,
    ));


    register_post_type('tutorial', array(
        'labels' => array(
            'name' => __('Tutorial', 'game-repack'),
            'singular_name' => __('Tutorial', 'game-repack'),
            'menu_name' => __('Tutorial', 'game-repack'),
            'add_new' => __('Add Tutorial', 'game-repack'),
            'add_new_item' => __('Add New Tutorial', 'game-repack'),
            'edit_item' => __('Edit Tutorial', 'game-repack'),
            'new_item' => __('New Tutorial', 'game-repack'),
            'view_item' => __('View Tutorial', 'game-repack'),
            'search_items' => __('Search Tutorial', 'game-repack'),
            'not_found' => __('No tutorial found', 'game-repack'),
            'all_items' => __('All Tutorial', 'game-repack'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'tutorial', 'with_front' => false),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array('title','editor','thumbnail','excerpt','comments','author'),
        'show_in_rest' => true,
        'taxonomies' => array('post_tag'),
    ));

    register_taxonomy('tutorial_category', array('tutorial'), array(
        'labels' => array(
            'name' => __('Tutorial Categories', 'game-repack'),
            'singular_name' => __('Tutorial Category', 'game-repack'),
            'menu_name' => __('Tutorial Categories', 'game-repack'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'tutorial-category', 'with_front' => false),
        'show_in_rest' => true,
    ));

}
add_action('init', 'game_repack_register_content_types');

function game_repack_ensure_page($title, $slug, $content = '') {
    $existing = get_page_by_path($slug);
    if ($existing) { return (int) $existing->ID; }
    $page_id = wp_insert_post(array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ));
    return is_wp_error($page_id) ? 0 : (int) $page_id;
}

function game_repack_menu_has_title($menu_id, $title) {
    $items = wp_get_nav_menu_items($menu_id);
    if (!$items) { return false; }
    foreach ($items as $item) {
        if (strcasecmp($item->title, $title) === 0) { return true; }
    }
    return false;
}

function game_repack_add_custom_menu_item($menu_id, $title, $url) {
    if (game_repack_menu_has_title($menu_id, $title)) { return; }
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title'  => $title,
        'menu-item-url'    => $url,
        'menu-item-status' => 'publish',
        'menu-item-type'   => 'custom',
    ));
}

function game_repack_add_page_menu_item($menu_id, $title, $page_id) {
    if (!$page_id || game_repack_menu_has_title($menu_id, $title)) { return; }
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title'     => $title,
        'menu-item-object-id' => $page_id,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
    ));
}

function game_repack_setup_recommended_menus() {
    $request  = game_repack_ensure_page('Request', 'request', '[game_repack_request_form]');
    $login    = game_repack_ensure_page('Login', 'login', '[game_repack_login_form]');
    $signup   = game_repack_ensure_page('Signup', 'signup', '[game_repack_signup_form]');
    $dmca     = game_repack_ensure_page('DMCA', 'dmca', '<p>Silakan hubungi kami melalui halaman kontak untuk permintaan DMCA atau laporan konten.</p>');
    $contact  = game_repack_ensure_page('Contact', 'contact', '<p>Hubungi kami melalui email atau form kontak yang tersedia.</p>');
    $about      = game_repack_ensure_page('About', 'about', '<p>Tentang website ini.</p>');
    $privacy    = game_repack_ensure_page('Privacy Policy', 'privacy-policy', '<p>Kebijakan privasi website.</p>');
    $disclaimer = game_repack_ensure_page('Disclaimer', 'disclaimer', '<p>Informasi di website ini disediakan untuk tujuan informasi.</p>');
    $terms      = game_repack_ensure_page('Terms of Use', 'terms-of-use', '<p>Syarat dan ketentuan penggunaan website.</p>');
    $sitemap    = game_repack_ensure_page('Sitemap', 'sitemap', '<p>Daftar halaman penting website.</p>');

    $locations = get_theme_mod('nav_menu_locations', array());
    if (empty($locations['primary'])) {
        $primary_id = wp_create_nav_menu('Main Menu');
        if (!is_wp_error($primary_id)) {
            game_repack_add_custom_menu_item($primary_id, 'Home', home_url('/'));
            game_repack_add_custom_menu_item($primary_id, 'Games', get_post_type_archive_link('game'));
            game_repack_add_custom_menu_item($primary_id, 'Software', get_post_type_archive_link('software'));
            game_repack_add_custom_menu_item($primary_id, 'News', get_post_type_archive_link('news'));
            game_repack_add_custom_menu_item($primary_id, 'Tutorial', get_post_type_archive_link('tutorial'));
            game_repack_add_page_menu_item($primary_id, 'Favorites', get_page_by_path('favorites') ? get_page_by_path('favorites')->ID : 0);
            game_repack_add_page_menu_item($primary_id, 'Request', $request);
            game_repack_add_page_menu_item($primary_id, 'DMCA', $dmca);
            game_repack_add_page_menu_item($primary_id, 'Contact', $contact);
            $locations['primary'] = $primary_id;
        }
    }
    if (empty($locations['footer'])) {
        $footer_id = wp_create_nav_menu('Footer Menu');
        if (!is_wp_error($footer_id)) {
            game_repack_add_page_menu_item($footer_id, 'About', $about);
            game_repack_add_page_menu_item($footer_id, 'Privacy Policy', $privacy);
            game_repack_add_page_menu_item($footer_id, 'Disclaimer', $disclaimer);
            game_repack_add_page_menu_item($footer_id, 'Terms of Use', $terms);
            game_repack_add_custom_menu_item($footer_id, 'XML Sitemap', home_url('/sitemap.xml'));
            game_repack_add_page_menu_item($footer_id, 'Sitemap', $sitemap);
            $locations['footer'] = $footer_id;
        }
    }
    set_theme_mod('nav_menu_locations', $locations);
}



function game_repack_remove_auth_items_from_primary_menu() {
    $locations = get_theme_mod('nav_menu_locations', array());
    if (empty($locations['primary'])) { return; }
    $items = wp_get_nav_menu_items($locations['primary']);
    if (!$items) { return; }
    foreach ($items as $item) {
        if (in_array(strtolower($item->title), array('login','signup'), true)) {
            wp_delete_post($item->ID, true);
        }
    }
}

function game_repack_after_switch_theme() {
    game_repack_register_content_types();
    if (!term_exists('Software', 'software_category')) { wp_insert_term('Software', 'software_category'); }
    if (!term_exists('Software', 'category')) { wp_insert_term('Software', 'category'); }
    if (!term_exists('Tutorial', 'tutorial_category')) { wp_insert_term('Tutorial', 'tutorial_category', array('slug' => 'tutorial')); }
    if (!term_exists('Game News', 'news_category')) { wp_insert_term('Game News', 'news_category', array('slug' => 'game-news')); }
    update_option('users_can_register', 1);
    update_option('default_role', 'subscriber');
    game_repack_setup_recommended_menus();
    game_repack_remove_auth_items_from_primary_menu();
    update_option('game_repack_auth_version', GAME_REPACK_VERSION);
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'game_repack_after_switch_theme');

// Customizer Turnstile Settings
function game_repack_customize_register($wp_customize) {
    $wp_customize->add_section('game_repack_turnstile_section', array(
        'title' => __('Cloudflare Turnstile Settings', 'game-repack'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('game_repack_turnstile_site_key', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('game_repack_turnstile_site_key_control', array(
        'label' => __('Turnstile Site Key', 'game-repack'),
        'section' => 'game_repack_turnstile_section',
        'settings' => 'game_repack_turnstile_site_key',
        'type' => 'text',
    ));

    $wp_customize->add_setting('game_repack_turnstile_secret_key', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('game_repack_turnstile_secret_key_control', array(
        'label' => __('Turnstile Secret Key', 'game-repack'),
        'section' => 'game_repack_turnstile_section',
        'settings' => 'game_repack_turnstile_secret_key',
        'type' => 'text',
    ));

    $wp_customize->add_section('game_repack_monetization_section', array(
        'title' => __('Monetization Settings', 'game-repack'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('game_repack_header_ad_code', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('game_repack_header_ad_code_control', array(
        'label' => __('Header Ad Code (Below Navigation)', 'game-repack'),
        'description' => '<textarea rows="4" style="width:100%;font-size:11px;font-family:monospace;color:#b7b7d8;background:#10102a;border:1px solid #2b2b61;padding:8px;" placeholder="// Paste your ad code here (e.g., Google AdSense code)&#10;// Example:&#10;<script async src=\"https://example.com/ad.js\"></script>&#10;<ins class=\"adsbygoogle\" ...></ins>', 'section' => 'game_repack_monetization_section',
        'settings' => 'game_repack_header_ad_code',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('game_repack_safelink_before_download_ad_code', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('game_repack_safelink_before_download_ad_code_control', array(
        'label' => __('Before Download Link Ad Code', 'game-repack'),
        'description' => '<textarea rows="4" style="width:100%;font-size:11px;font-family:monospace;color:#b7b7d8;background:#10102a;border:1px solid #2b2b61;padding:8px;" placeholder="// Paste your ad code here", 'section' => 'game_repack_monetization_section',
        'settings' => 'game_repack_safelink_before_download_ad_code',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('game_repack_safelink_enabled', array(
        'default' => 0,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('game_repack_safelink_enabled_control', array(
        'label' => __('Enable Safelink Redirect', 'game-repack'),
        'section' => 'game_repack_monetization_section',
        'settings' => 'game_repack_safelink_enabled',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('game_repack_safelink_timer_duration', array(
        'default' => 10,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('game_repack_safelink_timer_duration_control', array(
        'label' => __('Safelink Timer Duration (seconds)', 'game-repack'),
        'section' => 'game_repack_monetization_section',
        'settings' => 'game_repack_safelink_timer_duration',
        'type' => 'number',
        'input_min' => 5,
        'input_max' => 30,
    ));
}
add_action('customize_register', 'game_repack_customize_register');

function game_repack_verify_turnstile($token) {
    $secret = get_theme_mod('game_repack_turnstile_secret_key');
    if (empty($secret)) {
        return true; // If not configured, skip verification
    }
    if (empty($token)) {
        return false;
    }
    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', array(
        'body' => array(
            'secret' => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    ));
    if (is_wp_error($response)) {
        return false;
    }
    $body = json_decode(wp_remote_retrieve_body($response), true);
    return isset($body['success']) && $body['success'] === true;
}

function game_repack_scripts() {
    wp_enqueue_style('game-repack-style', get_stylesheet_uri(), array(), GAME_REPACK_VERSION);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');
    wp_enqueue_script('game-repack-custom', get_template_directory_uri() . '/js/custom.js', array(), GAME_REPACK_VERSION, true);

    if (is_post_type_archive(array('game', 'software')) || is_tax(array('game_genre', 'software_category'))) {
        wp_enqueue_script('game-repack-ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js', array('jquery'), GAME_REPACK_VERSION, true);
        wp_localize_script('game-repack-ajax-filter', 'gameRepackAjax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('game_repack_filter_nonce'),
        ));
    }

    if (is_user_logged_in()) {
        wp_enqueue_script('game-repack-favorites', get_template_directory_uri() . '/js/favorites.js', array('jquery'), GAME_REPACK_VERSION, true);
        wp_localize_script('game-repack-favorites', 'gameRepackFavs', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('game_repack_favorites_nonce'),
        ));
    }

    $site_key = get_theme_mod('game_repack_turnstile_site_key');
    if (!empty($site_key)) {
        wp_enqueue_script('cloudflare-turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'game_repack_scripts');

function game_repack_widgets() {
    register_sidebar(array(
        'name' => __('Main Sidebar', 'game-repack'),
        'id' => 'main-sidebar',
        'description' => __('Widgets for the main sidebar', 'game-repack'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'game_repack_widgets');

function game_repack_default_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('game')) . '">Games</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('software')) . '">Software</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('news')) . '">News</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('tutorial')) . '">Tutorial</a></li>';
    echo '<li><a href="' . esc_url(home_url('/request/')) . '">Request</a></li>';
    echo '<li><a href="' . esc_url(home_url('/dmca/')) . '">DMCA</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}

function game_repack_default_footer_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '"><i class="fas fa-angle-right"></i> About</a></li>';
    echo '<li><a href="' . esc_url(home_url('/privacy-policy/')) . '"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>';
    echo '<li><a href="' . esc_url(home_url('/disclaimer/')) . '"><i class="fas fa-angle-right"></i> Disclaimer</a></li>';
    echo '<li><a href="' . esc_url(home_url('/terms-of-use/')) . '"><i class="fas fa-angle-right"></i> Terms of Use</a></li>';
    echo '<li><a href="' . esc_url(home_url('/sitemap/')) . '"><i class="fas fa-angle-right"></i> Sitemap</a></li>';
    echo '</ul>';
}

function game_repack_set_view($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count === '') {
        add_post_meta($post_id, $count_key, '1', true);
    } else {
        update_post_meta($post_id, $count_key, absint($count) + 1);
    }
}
function game_repack_get_view($post_id) {
    $count = get_post_meta($post_id, 'post_views_count', true);
    return $count === '' ? 0 : absint($count);
}
function game_repack_track_views() {
    if (is_singular(array('post','game','software','news','tutorial'))) {
        game_repack_set_view(get_the_ID());
    }
}
add_action('wp_head', 'game_repack_track_views');

function game_repack_game_fields() {
    return array(
        'game_version'=>'Game Version',
        'game_size'=>'File Size',
        'game_developer'=>'Developer',
        'game_publisher'=>'Publisher',
        'game_release_date'=>'Release Date',
        'game_genre'=>'Genre',
        'download_link_1'=>'Download Link (Direct / Official)',
        'download_link_2'=>'Download Link (Mirror)',
        'download_link_3'=>'Download Link (Torrent / Optional)',
        'req_min_os'=>'Min OS',
        'req_min_cpu'=>'Min CPU',
        'req_min_ram'=>'Min RAM',
        'req_min_gpu'=>'Min GPU',
        'req_min_storage'=>'Min Storage',
        'req_rec_os'=>'Rec OS',
        'req_rec_cpu'=>'Rec CPU',
        'req_rec_ram'=>'Rec RAM',
        'req_rec_gpu'=>'Rec GPU',
        'req_rec_storage'=>'Rec Storage',
    );
}

function game_repack_software_fields() {
    return array(
        'software_version'=>'Software Version',
        'software_size'=>'File Size',
        'software_developer'=>'Developer / Company',
        'software_license'=>'License',
        'software_os'=>'Operating System',
        'software_release_date'=>'Release / Update Date',
        'software_website'=>'Official Website',
        'software_download_1'=>'Download Link (Official)',
        'software_download_2'=>'Download Link (Mirror)',
        'software_download_3'=>'Download Link (Alternative)',
        'soft_req_os'=>'Required OS',
        'soft_req_cpu'=>'Required CPU',
        'soft_req_ram'=>'Required RAM',
        'soft_req_storage'=>'Required Storage',
    );
}

function game_repack_enhancement_fields() {
    return array(
        'content_badges' => array('label' => 'Badge Status (comma separated)', 'type' => 'text', 'placeholder' => 'Updated, Popular, Recommended'),
        'official_link_1_label' => array('label' => 'Official Link 1 Label', 'type' => 'text', 'placeholder' => 'Steam / Official Website'),
        'official_link_1_url' => array('label' => 'Official Link 1 URL', 'type' => 'url', 'placeholder' => 'https://...'),
        'official_link_2_label' => array('label' => 'Official Link 2 Label', 'type' => 'text', 'placeholder' => 'Epic Games / Microsoft Store'),
        'official_link_2_url' => array('label' => 'Official Link 2 URL', 'type' => 'url', 'placeholder' => 'https://...'),
        'official_link_3_label' => array('label' => 'Official Link 3 Label', 'type' => 'text', 'placeholder' => 'GOG / Developer Site'),
        'official_link_3_url' => array('label' => 'Official Link 3 URL', 'type' => 'url', 'placeholder' => 'https://...'),
        'changelog_version' => array('label' => 'Changelog Version', 'type' => 'text', 'placeholder' => 'v1.0.0'),
        'changelog_date' => array('label' => 'Changelog Date', 'type' => 'text', 'placeholder' => '28 April 2026'),
        'changelog_status' => array('label' => 'Changelog Status', 'type' => 'text', 'placeholder' => 'Tested / Updated / Stable'),
        'changelog_notes' => array('label' => 'Changelog Notes', 'type' => 'textarea', 'placeholder' => "- Bug fixes\n- Performance improvements"),
        'rating_gameplay' => array('label' => 'Rating Gameplay / Ease of Use (0-10)', 'type' => 'number', 'placeholder' => '8.5'),
        'rating_graphics' => array('label' => 'Rating Graphics / UI (0-10)', 'type' => 'number', 'placeholder' => '9'),
        'rating_story' => array('label' => 'Rating Story / Features (0-10)', 'type' => 'number', 'placeholder' => '8'),
        'rating_performance' => array('label' => 'Rating Performance (0-10)', 'type' => 'number', 'placeholder' => '8'),
        'rating_overall' => array('label' => 'Rating Overall (0-10)', 'type' => 'number', 'placeholder' => '8.5'),
    );
}

function game_repack_render_meta_table($post, $fields, $nonce_action, $nonce_name) {
    wp_nonce_field($nonce_action, $nonce_name);
    echo '<table style="width:100%;">';
    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        $type = (strpos($key, 'download') !== false || strpos($key, 'website') !== false) ? 'url' : 'text';
        echo '<tr><td style="padding:8px;width:210px;"><label for="'.esc_attr($key).'"><strong>'.esc_html($label).'</strong></label></td>';
        echo '<td style="padding:8px;"><input id="'.esc_attr($key).'" type="'.esc_attr($type).'" name="'.esc_attr($key).'" value="'.esc_attr($value).'" style="width:100%;padding:8px;" /></td></tr>';
    }
    echo '</table>';
}

function game_repack_add_meta_boxes() {
    add_meta_box('game_info_meta', __('Game Information', 'game-repack'), 'game_repack_game_info_callback', array('game','post'), 'normal', 'high');
    add_meta_box('software_info_meta', __('Software Information', 'game-repack'), 'game_repack_software_info_callback', 'software', 'normal', 'high');
    add_meta_box('game_repack_enhancement_meta', __('SEO, Rating, Badge & Official Links', 'game-repack'), 'game_repack_enhancement_callback', array('game','software','news','tutorial','post'), 'normal', 'default');
}
add_action('add_meta_boxes', 'game_repack_add_meta_boxes');

function game_repack_game_info_callback($post) {
    game_repack_render_meta_table($post, game_repack_game_fields(), 'game_repack_save_game_meta', 'game_repack_game_meta_nonce');
}
function game_repack_software_info_callback($post) {
    game_repack_render_meta_table($post, game_repack_software_fields(), 'game_repack_save_software_meta', 'game_repack_software_meta_nonce');
}

function game_repack_enhancement_callback($post) {
    wp_nonce_field('game_repack_save_enhancement_meta', 'game_repack_enhancement_meta_nonce');
    echo '<p style="margin:0 0 12px;color:#555;">Isi bagian ini untuk menampilkan badge, tombol official link, changelog, rating review, dan schema SEO yang lebih lengkap.</p>';
    echo '<table style="width:100%;">';
    foreach (game_repack_enhancement_fields() as $key => $field) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><td style="padding:8px;width:230px;"><label for="'.esc_attr($key).'"><strong>'.esc_html($field['label']).'</strong></label></td><td style="padding:8px;">';
        if ($field['type'] === 'textarea') {
            echo '<textarea id="'.esc_attr($key).'" name="'.esc_attr($key).'" placeholder="'.esc_attr($field['placeholder']).'" style="width:100%;min-height:95px;padding:8px;">'.esc_textarea($value).'</textarea>';
        } else {
            $extra = $field['type'] === 'number' ? ' min="0" max="10" step="0.1"' : '';
            echo '<input id="'.esc_attr($key).'" type="'.esc_attr($field['type']).'" name="'.esc_attr($key).'" value="'.esc_attr($value).'" placeholder="'.esc_attr($field['placeholder']).'" style="width:100%;padding:8px;"'.$extra.' />';
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

function game_repack_save_meta_fields($post_id, $fields, $nonce_name, $nonce_action) {
    if (!isset($_POST[$nonce_name])) { return; }
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$nonce_name])), $nonce_action)) { return; }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return; }
    if (!current_user_can('edit_post', $post_id)) { return; }
    foreach (array_keys($fields) as $field) {
        if (isset($_POST[$field])) {
            $value = wp_unslash($_POST[$field]);
            $value = (strpos($field, 'download') !== false || strpos($field, 'website') !== false) ? esc_url_raw($value) : sanitize_text_field($value);
            update_post_meta($post_id, $field, $value);
        }
    }
}
function game_repack_save_meta($post_id) {
    game_repack_save_meta_fields($post_id, game_repack_game_fields(), 'game_repack_game_meta_nonce', 'game_repack_save_game_meta');
    game_repack_save_meta_fields($post_id, game_repack_software_fields(), 'game_repack_software_meta_nonce', 'game_repack_save_software_meta');
    game_repack_save_enhancement_meta($post_id);
}
add_action('save_post', 'game_repack_save_meta');

function game_repack_save_enhancement_meta($post_id) {
    if (!isset($_POST['game_repack_enhancement_meta_nonce'])) { return; }
    if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['game_repack_enhancement_meta_nonce'])), 'game_repack_save_enhancement_meta')) { return; }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return; }
    if (!current_user_can('edit_post', $post_id)) { return; }
    foreach (game_repack_enhancement_fields() as $key => $field) {
        if (isset($_POST[$key])) {
            $raw = wp_unslash($_POST[$key]);
            if ($field['type'] === 'url') {
                $value = esc_url_raw($raw);
            } elseif ($field['type'] === 'textarea') {
                $value = sanitize_textarea_field($raw);
            } elseif ($field['type'] === 'number') {
                $value = max(0, min(10, (float) $raw));
            } else {
                $value = sanitize_text_field($raw);
            }
            update_post_meta($post_id, $key, $value);
        }
    }
}


function game_repack_excerpt_length($length) { return 20; }
add_filter('excerpt_length', 'game_repack_excerpt_length');
function game_repack_excerpt_more($more) { return '...'; }
add_filter('excerpt_more', 'game_repack_excerpt_more');

function game_repack_breadcrumb() {
    echo '<div class="breadcrumb"><a href="' . esc_url(home_url('/')) . '"><i class="fas fa-home"></i> Home</a>';
    if (is_singular('game')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('game')) . '">Games</a>';
        $terms = get_the_terms(get_the_ID(), 'game_genre');
        if (!empty($terms) && !is_wp_error($terms)) {
            echo ' <span>&gt;</span> <a href="' . esc_url(get_term_link($terms[0])) . '">' . esc_html($terms[0]->name) . '</a>';
        }
        echo ' <span>&gt;</span> ' . esc_html(get_the_title());
    } elseif (is_singular('tutorial')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('tutorial')) . '">Tutorial</a>';
        $terms = get_the_terms(get_the_ID(), 'tutorial_category');
        if ($terms && !is_wp_error($terms)) { echo ' <span>&gt;</span> <a href="' . esc_url(get_term_link($terms[0])) . '">' . esc_html($terms[0]->name) . '</a>'; }
        echo ' <span>&gt;</span> ' . esc_html(get_the_title());
    } elseif (is_singular('software')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('software')) . '">Software</a>';
        $terms = get_the_terms(get_the_ID(), 'software_category');
        if (!empty($terms) && !is_wp_error($terms)) {
            echo ' <span>&gt;</span> <a href="' . esc_url(get_term_link($terms[0])) . '">' . esc_html($terms[0]->name) . '</a>';
        }
        echo ' <span>&gt;</span> ' . esc_html(get_the_title());
    } elseif (is_single()) {
        $categories = get_the_category();
        if ($categories) echo ' <span>&gt;</span> <a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
        echo ' <span>&gt;</span> ' . esc_html(get_the_title());
    } elseif (is_post_type_archive('game')) {
        echo ' <span>&gt;</span> Games';
    } elseif (is_post_type_archive('tutorial')) {
        echo ' <span>&gt;</span> Tutorial';
    } elseif (is_post_type_archive('software')) {
        echo ' <span>&gt;</span> Software';
    } elseif (is_tax('game_genre')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('game')) . '">Games</a> <span>&gt;</span> ' . esc_html(single_term_title('', false));
    } elseif (is_tax('tutorial_category')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('tutorial')) . '">Tutorial</a> <span>&gt;</span> ' . esc_html(single_term_title('', false));
    } elseif (is_tax('software_category')) {
        echo ' <span>&gt;</span> <a href="' . esc_url(get_post_type_archive_link('software')) . '">Software</a> <span>&gt;</span> ' . esc_html(single_term_title('', false));
    } elseif (is_category()) {
        echo ' <span>&gt;</span> ' . esc_html(single_cat_title('', false));
    } elseif (is_search()) {
        echo ' <span>&gt;</span> Search Results';
    } elseif (is_tag()) {
        echo ' <span>&gt;</span> ' . esc_html(single_tag_title('', false));
    } elseif (is_page()) {
        echo ' <span>&gt;</span> ' . esc_html(get_the_title());
    }
    echo '</div>';
}

function game_repack_format_count($count) {
    $count = absint($count);
    if ($count >= 1000000) return round($count / 1000000, 1) . 'M';
    if ($count >= 1000) return round($count / 1000, 1) . 'K';
    return (string) $count;
}

function game_repack_pagination($query = null) {
    if (!$query) { global $wp_query; $query = $wp_query; }
    $links = paginate_links(array(
        'current' => max(1, get_query_var('paged')),
        'total' => $query->max_num_pages,
        'type' => 'array',
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
    ));
    if ($links) { echo '<div class="pagination">' . implode('', $links) . '</div>'; }
}

function game_repack_get_primary_term_name($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $type = get_post_type($post_id);
    if ($type === 'game') {
        $terms = get_the_terms($post_id, 'game_genre');
    } elseif ($type === 'tutorial') {
        $terms = get_the_terms($post_id, 'tutorial_category');
    } elseif ($type === 'software') {
        $terms = get_the_terms($post_id, 'software_category');
    } else {
        $terms = get_the_category($post_id);
    }
    if (!empty($terms) && !is_wp_error($terms)) {
        return $terms[0]->name;
    }
    return $type === 'software' ? 'Software' : ($type === 'game' ? 'Game' : ($type === 'news' ? 'News' : ($type === 'tutorial' ? 'Tutorial' : 'Article')));
}

function game_repack_get_item_size($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    if (get_post_type($post_id) === 'software') {
        return get_post_meta($post_id, 'software_size', true);
    }
    return get_post_meta($post_id, 'game_size', true);
}

function game_repack_content_card($post_id = null, $show_type = true) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $post_type = get_post_type($post_id);
    $type_label = $post_type === 'software' ? 'Software' : ($post_type === 'game' ? 'Game' : ($post_type === 'news' ? 'News' : ($post_type === 'tutorial' ? 'Tutorial' : 'Article')));
    ?>
    <article class="game-card <?php echo esc_attr('card-type-' . $post_type); ?>">
        <div class="game-card-thumb">
            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                <?php if (has_post_thumbnail($post_id)) { echo get_the_post_thumbnail($post_id, 'game-card'); } else { echo '<div class="no-thumb"><i class="fas fa-image"></i></div>'; } ?>
            </a>
            <span class="category-badge"><?php echo esc_html(game_repack_get_primary_term_name($post_id)); ?></span>
            <?php if ($show_type) : ?><span class="content-type-badge <?php echo esc_attr($post_type); ?>"><?php echo esc_html($type_label); ?></span><?php endif; ?>
            <?php game_repack_render_badges($post_id, 'card'); ?>
            <span class="view-count"><i class="fas fa-eye"></i> <?php echo esc_html(game_repack_format_count(game_repack_get_view($post_id))); ?></span>
        </div>
        <div class="game-card-info">
            <h3><a href="<?php echo esc_url(get_permalink($post_id)); ?>"><?php echo esc_html(get_the_title($post_id)); ?></a></h3>
            <div class="game-card-meta">
                <span class="date"><i class="far fa-calendar"></i> <?php echo esc_html(get_the_date('M d, Y', $post_id)); ?></span>
                <?php $size = game_repack_get_item_size($post_id); if ($size) : ?><span class="size"><?php echo esc_html($size); ?></span><?php endif; ?>
            </div>
        </div>
    </article>
    <?php
}

function game_repack_archive_header($icon, $title, $description = '') {
    echo '<div class="section-header"><h2 class="section-title"><i class="' . esc_attr($icon) . '"></i> ' . esc_html($title) . '</h2></div>';
    if ($description) {
        echo '<div class="archive-description">' . wp_kses_post(wpautop($description)) . '</div>';
    }
}

function game_repack_social_share() {
    if (!is_singular()) { return; }
    $post_id = get_the_ID();
    $url = get_permalink($post_id);
    $title = get_the_title($post_id);
    $encoded_url = rawurlencode($url);
    $encoded_title = rawurlencode($title);
    $thumb = get_the_post_thumbnail_url($post_id, 'large');
    $encoded_thumb = $thumb ? rawurlencode($thumb) : '';
    $shares = array(
        'whatsapp' => array('label'=>'WhatsApp','icon'=>'fab fa-whatsapp','url'=>'https://api.whatsapp.com/send?text=' . $encoded_title . '%20' . $encoded_url),
        'facebook' => array('label'=>'Facebook','icon'=>'fab fa-facebook-f','url'=>'https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url),
        'twitter' => array('label'=>'X / Twitter','icon'=>'fab fa-x-twitter','url'=>'https://twitter.com/intent/tweet?url=' . $encoded_url . '&text=' . $encoded_title),
        'telegram' => array('label'=>'Telegram','icon'=>'fab fa-telegram-plane','url'=>'https://t.me/share/url?url=' . $encoded_url . '&text=' . $encoded_title),
        'linkedin' => array('label'=>'LinkedIn','icon'=>'fab fa-linkedin-in','url'=>'https://www.linkedin.com/sharing/share-offsite/?url=' . $encoded_url),
    );
    if ($encoded_thumb) {
        $shares['pinterest'] = array('label'=>'Pinterest','icon'=>'fab fa-pinterest-p','url'=>'https://pinterest.com/pin/create/button/?url=' . $encoded_url . '&media=' . $encoded_thumb . '&description=' . $encoded_title);
    }
    echo '<div class="share-box">';
    echo '<div class="share-box-head"><h3><i class="fas fa-share-nodes"></i> Bagikan Postingan</h3><span>Bantu temanmu menemukan konten ini</span></div>';
    echo '<div class="share-buttons">';
    foreach ($shares as $class => $share) {
        echo '<a class="share-btn ' . esc_attr($class) . '" href="' . esc_url($share['url']) . '" target="_blank" rel="noopener nofollow" aria-label="Share to ' . esc_attr($share['label']) . '"><i class="' . esc_attr($share['icon']) . '"></i><span>' . esc_html($share['label']) . '</span></a>';
    }
    echo '<button type="button" class="share-btn copy-link" data-copy-url="' . esc_url($url) . '" aria-label="Copy link"><i class="fas fa-link"></i><span>Copy Link</span></button>';
    echo '</div></div>';
}

function game_repack_include_custom_types_in_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', array('post','game','software','news','tutorial'));
    }
}
add_action('pre_get_posts', 'game_repack_include_custom_types_in_search');


function game_repack_get_badges($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $raw = get_post_meta($post_id, 'content_badges', true);
    if (!$raw) { return array(); }
    $badges = array_filter(array_map('trim', explode(',', $raw)));
    return array_slice($badges, 0, 4);
}

function game_repack_render_badges($post_id = null, $context = 'single') {
    $badges = game_repack_get_badges($post_id);
    if (!$badges) { return; }
    $class = $context === 'card' ? 'status-badges status-badges-card' : 'status-badges';
    echo '<div class="' . esc_attr($class) . '">';
    foreach ($badges as $badge) {
        echo '<span>' . esc_html($badge) . '</span>';
    }
    echo '</div>';
}

function game_repack_get_official_links($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $links = array();
    for ($i = 1; $i <= 3; $i++) {
        $url = get_post_meta($post_id, 'official_link_' . $i . '_url', true);
        $label = get_post_meta($post_id, 'official_link_' . $i . '_label', true);
        if ($url) {
            $links[] = array('url' => $url, 'label' => $label ? $label : 'Official Link');
        }
    }
    if (get_post_type($post_id) === 'software') {
        $site = get_post_meta($post_id, 'software_website', true);
        if ($site) { $links[] = array('url' => $site, 'label' => 'Official Website'); }
    }
    return $links;
}

function game_repack_render_official_links($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $links = game_repack_get_official_links($post_id);
    if (!$links) { return; }
    echo '<div class="official-links-box"><h3><i class="fas fa-shield-halved"></i> Official Links</h3><p>Gunakan link resmi untuk informasi, pembelian, update, atau download yang lebih aman.</p><div class="official-link-buttons">';
    foreach ($links as $link) {
        echo '<a href="' . esc_url($link['url']) . '" target="_blank" rel="nofollow noopener" class="official-link-btn"><i class="fas fa-arrow-up-right-from-square"></i> ' . esc_html($link['label']) . '</a>';
    }
    echo '</div></div>';
}

function game_repack_render_changelog($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $version = get_post_meta($post_id, 'changelog_version', true);
    $date = get_post_meta($post_id, 'changelog_date', true);
    $status = get_post_meta($post_id, 'changelog_status', true);
    $notes = get_post_meta($post_id, 'changelog_notes', true);
    if (!$version && !$date && !$status && !$notes) { return; }
    echo '<div class="changelog-box"><h3><i class="fas fa-rotate"></i> Latest Update / Changelog</h3><div class="changelog-grid">';
    if ($version) { echo '<div><span>Version</span><strong>' . esc_html($version) . '</strong></div>'; }
    if ($date) { echo '<div><span>Updated</span><strong>' . esc_html($date) . '</strong></div>'; }
    if ($status) { echo '<div><span>Status</span><strong>' . esc_html($status) . '</strong></div>'; }
    echo '</div>';
    if ($notes) {
        echo '<div class="changelog-notes">' . wp_kses_post(wpautop(esc_html($notes))) . '</div>';
    }
    echo '</div>';
}

function game_repack_rating_items($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $type = get_post_type($post_id);
    $labels = $type === 'software'
        ? array('rating_gameplay' => 'Ease of Use', 'rating_graphics' => 'UI / Design', 'rating_story' => 'Features', 'rating_performance' => 'Performance', 'rating_overall' => 'Overall')
        : array('rating_gameplay' => 'Gameplay', 'rating_graphics' => 'Graphics', 'rating_story' => 'Story / Features', 'rating_performance' => 'Performance', 'rating_overall' => 'Overall');
    $items = array();
    foreach ($labels as $key => $label) {
        $value = get_post_meta($post_id, $key, true);
        if ($value !== '') { $items[] = array('label' => $label, 'value' => max(0, min(10, (float) $value))); }
    }
    return $items;
}

function game_repack_render_rating($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $items = game_repack_rating_items($post_id);
    if (!$items) { return; }
    $overall = get_post_meta($post_id, 'rating_overall', true);
    if ($overall === '') {
        $sum = 0; foreach ($items as $item) { $sum += $item['value']; }
        $overall = count($items) ? round($sum / count($items), 1) : 0;
    }
    echo '<div class="rating-box"><div class="rating-score"><span>' . esc_html(number_format((float) $overall, 1)) . '</span><small>/10</small><strong>Rating Review</strong></div><div class="rating-bars">';
    foreach ($items as $item) {
        $percent = $item['value'] * 10;
        echo '<div class="rating-row"><div class="rating-label"><span>' . esc_html($item['label']) . '</span><b>' . esc_html(number_format($item['value'], 1)) . '</b></div><div class="rating-track"><span style="width:' . esc_attr($percent) . '%"></span></div></div>';
    }
    echo '</div></div>';
}

function game_repack_render_disclaimer($context = '') {
    echo '<div class="disclaimer-box"><h3><i class="fas fa-triangle-exclamation"></i> Disclaimer</h3><p>Informasi di halaman ini disediakan untuk tujuan edukasi dan referensi. Selalu dukung developer dengan memakai produk original, link resmi, dan sumber terpercaya. Website ini tidak menyarankan penggunaan file ilegal, crack, atau konten yang melanggar hak cipta.</p></div>';
}

function game_repack_render_report_button($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $url = add_query_arg(array('report_link' => 1, 'post_id' => $post_id, 'post_title' => rawurlencode(get_the_title($post_id))), home_url('/request/'));
    echo '<div class="report-link-box"><a class="report-link-btn" href="' . esc_url($url) . '"><i class="fas fa-flag"></i> Report Broken Link</a><span>Laporkan link mati, versi salah, atau informasi yang perlu diperbarui.</span></div>';
}

function game_repack_request_form_shortcode() {
    $post_id = isset($_GET['post_id']) ? absint($_GET['post_id']) : 0;
    $post_title = isset($_GET['post_title']) ? sanitize_text_field(wp_unslash($_GET['post_title'])) : '';
    if (!$post_title && $post_id) { $post_title = get_the_title($post_id); }
    $is_report = isset($_GET['report_link']);
    ob_start();
    if (isset($_GET['request_status']) && $_GET['request_status'] === 'success') {
        echo '<div class="form-notice success"><i class="fas fa-check-circle"></i> Terima kasih, laporan/request kamu sudah terkirim.</div>';
    }
    ?>
    <div class="request-form-box">
        <h2><i class="fas fa-paper-plane"></i> <?php echo $is_report ? 'Report Broken Link' : 'Request Game / Software'; ?></h2>
        <p><?php echo $is_report ? 'Laporkan link yang rusak, error, atau konten yang perlu diperbarui.' : 'Kirim request game, software, versi update, atau tutorial yang ingin dibahas.'; ?></p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="game-repack-request-form">
            <input type="hidden" name="action" value="game_repack_request">
            <?php wp_nonce_field('game_repack_request_action', 'game_repack_request_nonce'); ?>
            <div class="form-grid">
                <label>Nama Kamu<input type="text" name="request_name" placeholder="Nama" required></label>
                <label>Email / WhatsApp<input type="text" name="request_contact" placeholder="Email atau WhatsApp" required></label>
            </div>
            <label>Jenis Request<select name="request_type" required>
                <option value="Report Broken Link" <?php selected($is_report); ?>>Report Broken Link</option>
                <option value="Request Game">Request Game</option>
                <option value="Request Software">Request Software</option>
                <option value="Request Tutorial">Request Tutorial</option>
                <option value="Other">Lainnya</option>
            </select></label>
            <label>Judul Game / Software / Postingan<input type="text" name="request_title" value="<?php echo esc_attr($post_title); ?>" placeholder="Contoh: Black Myth Wukong" required></label>
            <label>Versi / Link Bermasalah<input type="text" name="request_version" placeholder="Versi atau URL yang bermasalah"></label>
            <?php
            $site_key = get_theme_mod('game_repack_turnstile_site_key');
            if (!empty($site_key)) {
                echo '<div class="cf-turnstile" data-sitekey="' . esc_attr($site_key) . '" data-action="turnstile-spin-v2" style="margin-bottom: 14px;"></div>';
            }
            ?>
            <label>Catatan<textarea name="request_message" placeholder="Tulis detail request atau masalah link..." required></textarea></label>
            <button type="submit" class="btn-home"><i class="fas fa-paper-plane"></i> Kirim Request</button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('game_repack_request_form', 'game_repack_request_form_shortcode');

function game_repack_handle_request_form() {
    if (!isset($_POST['game_repack_request_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['game_repack_request_nonce'])), 'game_repack_request_action')) {
        wp_die('Invalid request.');
    }
    $turnstile_token = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
    if (!game_repack_verify_turnstile($turnstile_token)) {
        wp_die('Turnstile verification failed. Please try again.');
    }
    $name = isset($_POST['request_name']) ? sanitize_text_field(wp_unslash($_POST['request_name'])) : '';
    $contact = isset($_POST['request_contact']) ? sanitize_text_field(wp_unslash($_POST['request_contact'])) : '';
    $type = isset($_POST['request_type']) ? sanitize_text_field(wp_unslash($_POST['request_type'])) : '';
    $title = isset($_POST['request_title']) ? sanitize_text_field(wp_unslash($_POST['request_title'])) : '';
    $version = isset($_POST['request_version']) ? sanitize_text_field(wp_unslash($_POST['request_version'])) : '';
    $message = isset($_POST['request_message']) ? sanitize_textarea_field(wp_unslash($_POST['request_message'])) : '';
    $body = "Name: {$name}\nContact: {$contact}\nType: {$type}\nTitle: {$title}\nVersion/URL: {$version}\n\nMessage:\n{$message}\n\nSent from: " . home_url('/');
    wp_mail(get_option('admin_email'), '[' . get_bloginfo('name') . '] ' . $type . ': ' . $title, $body);
    wp_safe_redirect(add_query_arg('request_status', 'success', wp_get_referer() ? wp_get_referer() : home_url('/request/')));
    exit;
}
add_action('admin_post_game_repack_request', 'game_repack_handle_request_form');
add_action('admin_post_nopriv_game_repack_request', 'game_repack_handle_request_form');


/* =========================================================
   Login & Signup Front-end v1.4.2
   ========================================================= */
// AJAX Favorites Handler
function game_repack_ajax_toggle_favorite() {
    check_ajax_referer('game_repack_favorites_nonce', 'nonce');

    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => 'You must be logged in.'));
    }

    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    if (!$post_id) {
        wp_send_json_error(array('message' => 'Invalid post ID.'));
    }

    $user_id = get_current_user_id();
    $favorites = get_user_meta($user_id, 'game_repack_favorites', true);
    if (!is_array($favorites)) {
        $favorites = array();
    }

    $status = 'added';
    if (in_array($post_id, $favorites)) {
        $favorites = array_diff($favorites, array($post_id));
        $status = 'removed';
    } else {
        $favorites[] = $post_id;
    }

    update_user_meta($user_id, 'game_repack_favorites', $favorites);
    wp_send_json_success(array('status' => $status));
}
add_action('wp_ajax_game_repack_toggle_favorite', 'game_repack_ajax_toggle_favorite');

// Render Favorite Button
function game_repack_render_favorite_button($post_id = null) {
    if (!is_user_logged_in()) {
        return;
    }
    $post_id = $post_id ? $post_id : get_the_ID();
    $user_id = get_current_user_id();
    $favorites = get_user_meta($user_id, 'game_repack_favorites', true);
    if (!is_array($favorites)) {
        $favorites = array();
    }
    $is_fav = in_array($post_id, $favorites);
    $class = $is_fav ? 'fav-active' : '';
    $icon = $is_fav ? 'fas fa-heart' : 'far fa-heart';
    $label = $is_fav ? 'Favorited' : 'Add to Favorites';

    echo '<button type="button" class="btn-favorite ' . esc_attr($class) . '" data-post-id="' . esc_attr($post_id) . '" style="background: var(--bg-card); border: 1px solid var(--border-color); color: var(--text-primary); padding: 10px 18px; border-radius: 999px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; font-weight: 800; font-size: 13px; transition: var(--transition);">';
    echo '<i class="' . esc_attr($icon) . '" style="color: var(--accent-red);"></i>';
    echo '<span>' . esc_html($label) . '</span>';
    echo '</button>';
}

// Favorites Shortcode
function game_repack_favorites_shortcode() {
    if (!is_user_logged_in()) {
        return '<p class="empty-state">Silakan <a href="' . esc_url(home_url('/login/')) . '">Login</a> terlebih dahulu untuk melihat daftar favorit Anda.</p>';
    }
    $user_id = get_current_user_id();
    $favorites = get_user_meta($user_id, 'game_repack_favorites', true);
    if (empty($favorites) || !is_array($favorites)) {
        return '<p class="empty-state">Belum ada item yang ditambahkan ke favorit.</p>';
    }

    $args = array(
        'post_type' => array('game', 'software'),
        'post__in' => $favorites,
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()) {
        echo '<div class="games-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            game_repack_content_card(get_the_ID(), true);
        }
        echo '</div>';
    } else {
        echo '<p class="empty-state">Belum ada item favorit.</p>';
    }
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('game_repack_favorites', 'game_repack_favorites_shortcode');

// Register Favorites Page in Auth Switch
function game_repack_auth_upgrade_once() {
    $stored = get_option('game_repack_auth_version', '');
    if ($stored === GAME_REPACK_VERSION) { return; }
    update_option('users_can_register', 1);
    update_option('default_role', 'subscriber');
    game_repack_ensure_page('Login', 'login', '[game_repack_login_form]');
    game_repack_ensure_page('Signup', 'signup', '[game_repack_signup_form]');
    game_repack_ensure_page('Request', 'request', '[game_repack_request_form]');
    game_repack_ensure_page('Favorites', 'favorites', '[game_repack_favorites]');
    game_repack_remove_auth_items_from_primary_menu();
    update_option('game_repack_auth_version', GAME_REPACK_VERSION);
}
add_action('init', 'game_repack_auth_upgrade_once', 30);

function game_repack_header_auth_links() {
    echo '<div class="header-auth">';
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $name = $user && $user->exists() ? $user->display_name : 'Member';
        echo '<a class="auth-link auth-profile" href="' . esc_url(admin_url('profile.php')) . '"><i class="fas fa-user-circle"></i> ' . esc_html($name) . '</a>';
        echo '<a class="auth-link auth-favorites" href="' . esc_url(home_url('/favorites/')) . '"><i class="fas fa-heart"></i> Favorites</a>';
        echo '<a class="auth-link auth-logout" href="' . esc_url(wp_logout_url(home_url('/'))) . '"><i class="fas fa-sign-out-alt"></i> Logout</a>';
    } else {
        echo '<a class="auth-link auth-login" href="' . esc_url(home_url('/login/')) . '"><i class="fas fa-sign-in-alt"></i> Login</a>';
        echo '<a class="auth-link auth-signup" href="' . esc_url(home_url('/signup/')) . '"><i class="fas fa-user-plus"></i> Signup</a>';
    }
    echo '</div>';
}

function game_repack_auth_message($type, $message) {
    return '<div class="form-notice ' . esc_attr($type) . '"><i class="fas ' . ($type === 'success' ? 'fa-check-circle' : 'fa-triangle-exclamation') . '"></i> ' . esc_html($message) . '</div>';
}

function game_repack_login_form_shortcode() {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        ob_start(); ?>
        <div class="auth-form-box">
            <h2><i class="fas fa-user-check"></i> Sudah Login</h2>
            <p>Halo, <strong><?php echo esc_html($user->display_name); ?></strong>. Kamu sudah masuk ke akun GameModia.</p>
            <div class="download-buttons auth-buttons">
                <a class="btn-download direct" href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Ke Beranda</a>
                <a class="btn-download mirror" href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <?php return ob_get_clean();
    }
    $status = isset($_GET['login_status']) ? sanitize_text_field(wp_unslash($_GET['login_status'])) : '';
    $registered = isset($_GET['registered']) ? sanitize_text_field(wp_unslash($_GET['registered'])) : '';
    ob_start();
    if ($registered === '1') { echo game_repack_auth_message('success', 'Akun berhasil dibuat. Silakan login.'); }
    if ($status === 'failed') { echo game_repack_auth_message('error', 'Login gagal. Periksa username/email dan password.'); }
    if ($status === 'empty') { echo game_repack_auth_message('error', 'Username/email dan password wajib diisi.'); }
    ?>
    <div class="auth-form-box">
        <h2><i class="fas fa-sign-in-alt"></i> Login Member</h2>
        <p>Masuk ke akun GameModia untuk komentar, request game/software, dan mengikuti update terbaru.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="game-repack-auth-form">
            <input type="hidden" name="action" value="game_repack_login">
            <?php wp_nonce_field('game_repack_login_action', 'game_repack_login_nonce'); ?>
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
            <label>Username atau Email<input type="text" name="log" placeholder="Username atau email" required></label>
            <label>Password<input type="password" name="pwd" placeholder="Password" required></label>
            <?php
            $site_key = get_theme_mod('game_repack_turnstile_site_key');
            if (!empty($site_key)) {
                echo '<div class="cf-turnstile" data-sitekey="' . esc_attr($site_key) . '" data-action="turnstile-spin-v2" style="margin-bottom: 14px;"></div>';
            }
            ?>
            <label class="checkbox-label"><input type="checkbox" name="rememberme" value="forever"> Ingat saya</label>
            <button type="submit" class="btn-home"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
        <div class="auth-helper-links">
            <a href="<?php echo esc_url(home_url('/signup/')); ?>">Belum punya akun? Signup</a>
            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Lupa password?</a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('game_repack_login_form', 'game_repack_login_form_shortcode');

function game_repack_signup_form_shortcode() {
    if (is_user_logged_in()) {
        return game_repack_auth_message('success', 'Kamu sudah login. Tidak perlu daftar ulang.');
    }
    if (!get_option('users_can_register')) {
        return game_repack_auth_message('error', 'Pendaftaran akun sedang dinonaktifkan oleh admin.');
    }
    $status = isset($_GET['signup_status']) ? sanitize_text_field(wp_unslash($_GET['signup_status'])) : '';
    $messages = array(
        'empty' => 'Semua field wajib diisi.',
        'password_mismatch' => 'Konfirmasi password tidak sama.',
        'weak_password' => 'Password minimal 8 karakter.',
        'invalid_email' => 'Format email tidak valid.',
        'username_exists' => 'Username sudah digunakan.',
        'email_exists' => 'Email sudah terdaftar.',
        'failed' => 'Pendaftaran gagal. Coba lagi.',
        'spam' => 'Permintaan tidak valid.'
    );
    ob_start();
    if (isset($messages[$status])) { echo game_repack_auth_message('error', $messages[$status]); }
    ?>
    <div class="auth-form-box">
        <h2><i class="fas fa-user-plus"></i> Daftar Akun GameModia</h2>
        <p>Buat akun gratis untuk request game/software, komentar, dan mengikuti update terbaru.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="game-repack-auth-form">
            <input type="hidden" name="action" value="game_repack_signup">
            <?php wp_nonce_field('game_repack_signup_action', 'game_repack_signup_nonce'); ?>
            <input type="text" name="website" value="" class="hp-field" tabindex="-1" autocomplete="off">
            <div class="form-grid">
                <label>Username<input type="text" name="user_login" placeholder="Username" required></label>
                <label>Email<input type="email" name="user_email" placeholder="Email aktif" required></label>
            </div>
            <div class="form-grid">
                <label>Password<input type="password" name="user_pass" placeholder="Minimal 8 karakter" required></label>
                <label>Konfirmasi Password<input type="password" name="user_pass_confirm" placeholder="Ulangi password" required></label>
            </div>
            <?php
            $site_key = get_theme_mod('game_repack_turnstile_site_key');
            if (!empty($site_key)) {
                echo '<div class="cf-turnstile" data-sitekey="' . esc_attr($site_key) . '" data-action="turnstile-spin-v2" style="margin-bottom: 14px;"></div>';
            }
            ?>
            <button type="submit" class="btn-home"><i class="fas fa-user-plus"></i> Daftar Sekarang</button>
        </form>
        <div class="auth-helper-links">
            <a href="<?php echo esc_url(home_url('/login/')); ?>">Sudah punya akun? Login</a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('game_repack_signup_form', 'game_repack_signup_form_shortcode');

function game_repack_handle_login() {
    if (!isset($_POST['game_repack_login_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['game_repack_login_nonce'])), 'game_repack_login_action')) {
        wp_safe_redirect(add_query_arg('login_status', 'failed', home_url('/login/'))); exit;
    }
    $turnstile_token = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
    if (!game_repack_verify_turnstile($turnstile_token)) {
        wp_safe_redirect(add_query_arg('login_status', 'failed', home_url('/login/'))); exit;
    }
    $login = isset($_POST['log']) ? sanitize_text_field(wp_unslash($_POST['log'])) : '';
    $password = isset($_POST['pwd']) ? (string) wp_unslash($_POST['pwd']) : '';
    if ($login === '' || $password === '') {
        wp_safe_redirect(add_query_arg('login_status', 'empty', home_url('/login/'))); exit;
    }
    $creds = array(
        'user_login' => $login,
        'user_password' => $password,
        'remember' => isset($_POST['rememberme'])
    );
    $user = wp_signon($creds, is_ssl());
    if (is_wp_error($user)) {
        wp_safe_redirect(add_query_arg('login_status', 'failed', home_url('/login/'))); exit;
    }
    $redirect = isset($_POST['redirect_to']) ? esc_url_raw(wp_unslash($_POST['redirect_to'])) : home_url('/');
    wp_safe_redirect($redirect ? $redirect : home_url('/')); exit;
}
add_action('admin_post_nopriv_game_repack_login', 'game_repack_handle_login');
add_action('admin_post_game_repack_login', 'game_repack_handle_login');

function game_repack_handle_signup() {
    if (!isset($_POST['game_repack_signup_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['game_repack_signup_nonce'])), 'game_repack_signup_action')) {
        wp_safe_redirect(add_query_arg('signup_status', 'failed', home_url('/signup/'))); exit;
    }
    $turnstile_token = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
    if (!game_repack_verify_turnstile($turnstile_token)) {
        wp_safe_redirect(add_query_arg('signup_status', 'failed', home_url('/signup/'))); exit;
    }
    if (!empty($_POST['website'])) {
        wp_safe_redirect(add_query_arg('signup_status', 'spam', home_url('/signup/'))); exit;
    }
    if (!get_option('users_can_register')) {
        wp_safe_redirect(add_query_arg('signup_status', 'failed', home_url('/signup/'))); exit;
    }
    $username = isset($_POST['user_login']) ? sanitize_user(wp_unslash($_POST['user_login']), true) : '';
    $email = isset($_POST['user_email']) ? sanitize_email(wp_unslash($_POST['user_email'])) : '';
    $pass = isset($_POST['user_pass']) ? (string) wp_unslash($_POST['user_pass']) : '';
    $confirm = isset($_POST['user_pass_confirm']) ? (string) wp_unslash($_POST['user_pass_confirm']) : '';
    if ($username === '' || $email === '' || $pass === '' || $confirm === '') {
        wp_safe_redirect(add_query_arg('signup_status', 'empty', home_url('/signup/'))); exit;
    }
    if ($pass !== $confirm) {
        wp_safe_redirect(add_query_arg('signup_status', 'password_mismatch', home_url('/signup/'))); exit;
    }
    if (strlen($pass) < 8) {
        wp_safe_redirect(add_query_arg('signup_status', 'weak_password', home_url('/signup/'))); exit;
    }
    if (!is_email($email)) {
        wp_safe_redirect(add_query_arg('signup_status', 'invalid_email', home_url('/signup/'))); exit;
    }
    if (username_exists($username)) {
        wp_safe_redirect(add_query_arg('signup_status', 'username_exists', home_url('/signup/'))); exit;
    }
    if (email_exists($email)) {
        wp_safe_redirect(add_query_arg('signup_status', 'email_exists', home_url('/signup/'))); exit;
    }
    $user_id = wp_create_user($username, $pass, $email);
    if (is_wp_error($user_id)) {
        wp_safe_redirect(add_query_arg('signup_status', 'failed', home_url('/signup/'))); exit;
    }
    $user = new WP_User($user_id);
    $user->set_role('subscriber');
    if (function_exists('wp_new_user_notification')) {
        wp_new_user_notification($user_id, null, 'both');
    }
    wp_safe_redirect(add_query_arg('registered', '1', home_url('/login/'))); exit;
}
add_action('admin_post_nopriv_game_repack_signup', 'game_repack_handle_signup');

function game_repack_get_schema_image($post_id) {
    $image = get_the_post_thumbnail_url($post_id, 'full');
    return $image ? $image : '';
}

function game_repack_output_schema() {
    if (!is_singular(array('post','game','software','news','tutorial'))) { return; }
    $post_id = get_the_ID();
    $type = get_post_type($post_id);
    $schema_type = $type === 'game' ? 'VideoGame' : ($type === 'software' ? 'SoftwareApplication' : 'BlogPosting');
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => $schema_type,
        'name' => get_the_title($post_id),
        'headline' => get_the_title($post_id),
        'url' => get_permalink($post_id),
        'datePublished' => get_the_date('c', $post_id),
        'dateModified' => get_the_modified_date('c', $post_id),
        'author' => array('@type' => 'Person', 'name' => get_the_author_meta('display_name', get_post_field('post_author', $post_id))),
        'publisher' => array('@type' => 'Organization', 'name' => get_bloginfo('name')),
        'description' => wp_strip_all_tags(get_the_excerpt($post_id)),
    );
    $image = game_repack_get_schema_image($post_id);
    if ($image) { $schema['image'] = array($image); }
    $overall = get_post_meta($post_id, 'rating_overall', true);
    if ($overall !== '') { $schema['aggregateRating'] = array('@type' => 'AggregateRating', 'ratingValue' => (float) $overall, 'bestRating' => 10, 'ratingCount' => 1); }
    if ($type === 'software') {
        $schema['applicationCategory'] = game_repack_get_primary_term_name($post_id);
        $schema['operatingSystem'] = get_post_meta($post_id, 'software_os', true) ?: get_post_meta($post_id, 'soft_req_os', true);
        $schema['softwareVersion'] = get_post_meta($post_id, 'software_version', true);
    }
    if ($type === 'game') {
        $schema['genre'] = game_repack_get_primary_term_name($post_id);
        $schema['gamePlatform'] = 'PC';
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode(array_filter($schema), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
add_action('wp_head', 'game_repack_output_schema', 30);

function game_repack_defer_custom_script($tag, $handle, $src) {
    if ($handle === 'game-repack-custom') {
        return '<script src="' . esc_url($src) . '" defer></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'game_repack_defer_custom_script', 10, 3);

function game_repack_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://cdnjs.cloudflare.com';
    }
    return $urls;
}
add_filter('wp_resource_hints', 'game_repack_resource_hints', 10, 2);

function game_repack_image_attributes($attr, $attachment, $size) {
    if (empty($attr['loading'])) { $attr['loading'] = 'lazy'; }
    $attr['decoding'] = 'async';
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'game_repack_image_attributes', 10, 3);


/**
 * Hide DMCA and Contact from header/menu output.
 * This is useful when the menu is controlled from Appearance > Menus,
 * not only hardcoded in header.php.
 */
function game_repack_hide_dmca_contact_menu_items($items, $args) {
    foreach ($items as $key => $item) {
        $title = strtolower(trim(wp_strip_all_tags($item->title)));
        $url   = strtolower($item->url);

        if (
            $title === 'dmca' ||
            $title === 'contact' ||
            strpos($url, '/dmca') !== false ||
            strpos($url, '/contact') !== false
        ) {
            unset($items[$key]);
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'game_repack_hide_dmca_contact_menu_items', 10, 2);


/**
 * Fix /blog/ URL for Latest Posts.
 * This makes https://domain.com/blog/ work without needing to create a Blog page manually.
 */
function game_repack_blog_rewrite_rule() {
    add_rewrite_rule('^blog/?$', 'index.php?game_repack_blog=1', 'top');
}
add_action('init', 'game_repack_blog_rewrite_rule');

function game_repack_blog_query_vars($vars) {
    $vars[] = 'game_repack_blog';
    return $vars;
}
add_filter('query_vars', 'game_repack_blog_query_vars');

function game_repack_blog_template_include($template) {
    if (get_query_var('game_repack_blog')) {
        $blog_template = get_template_directory() . '/page-blog.php';
        if (file_exists($blog_template)) {
            return $blog_template;
        }
    }
    return $template;
}
add_filter('template_include', 'game_repack_blog_template_include');

// AJAX Filter Handler
function game_repack_ajax_filter_posts() {
    check_ajax_referer('game_repack_filter_nonce', 'nonce');

    $post_type = isset($_POST['post_type']) ? sanitize_text_field(wp_unslash($_POST['post_type'])) : 'game';
    $term_id   = isset($_POST['term_id']) ? intval($_POST['term_id']) : 0;
    $sort      = isset($_POST['sort']) ? sanitize_text_field(wp_unslash($_POST['sort'])) : 'newest';

    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => 12,
        'post_status'    => 'publish',
    );

    // Filter by taxonomy
    if ($term_id > 0) {
        $taxonomy = ($post_type === 'game') ? 'game_genre' : 'software_category';
        $args['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
        );
    }

    // Sort order
    if ($sort === 'popular') {
        $args['meta_key'] = 'game_repack_views';
        $args['orderby']  = 'meta_value_num';
        $args['order']    = 'DESC';
    } elseif ($sort === 'alphabetical') {
        $args['orderby'] = 'title';
        $args['order']   = 'ASC';
    } else {
        $args['orderby'] = 'date';
        $args['order']   = 'DESC';
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        echo '<div class="games-grid' . ($post_type === 'software' ? ' software-grid' : '') . '">';
        while ($query->have_posts()) {
            $query->the_post();
            game_repack_content_card(get_the_ID(), false);
        }
        echo '</div>';
    } else {
        echo '<p class="empty-state">No items found matching the filter.</p>';
    }
    wp_reset_postdata();

    $html = ob_get_clean();
    wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_game_repack_filter', 'game_repack_ajax_filter_posts');
add_action('wp_ajax_nopriv_game_repack_filter', 'game_repack_ajax_filter_posts');

function game_repack_flush_rewrite_on_switch() {
    game_repack_blog_rewrite_rule();
    game_repack_safelink_rewrite_rule();
    game_repack_xml_sitemap_rewrite_rule();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'game_repack_flush_rewrite_on_switch');

// =============================================
// MONETIZATION: Safelink / Download Redirection
// =============================================

// Safelink rewrite rule
function game_repack_safelink_rewrite_rule() {
    add_rewrite_rule('^safelink/([a-zA-Z0-9_-]+)/?$', 'index.php?safelink_redirect=1&ref=$matches[1]', 'top');
}
add_action('init', 'game_repack_safelink_rewrite_rule');

function game_repack_safelink_query_vars($vars) {
    $vars[] = 'safelink_redirect';
    return $vars;
}
add_filter('query_vars', 'game_repack_safelink_query_vars');

function game_repack_safelink_template_include($template) {
    if (get_query_var('safelink_redirect')) {
        $safelink_template = get_template_directory() . '/page-safelink.php';
        if (file_exists($safelink_template)) {
            return $safelink_template;
        }
        return home_url('/');
    }
    return $template;
}
add_filter('template_include', 'game_repack_safelink_template_include');

// Generate safelink URL for download links
function game_repack_encrypt_url($url) {
    $key = get_option('game_repack_safelink_key', 'GameRepackTheme2024SecureKey');
    $data = base64_encode(json_encode(array(
        'url' => $url,
        'ts' => time(),
        'h' => md5($url . $key . time())
    )));
    // Simple XOR obfuscation + base64
    $result = '';
    $len = strlen($data);
    for ($i = 0; $i < $len; $i++) {
        $result .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
    }
    return rtrim(strtr(base64_encode($result), '+/', '-_'), '=');
}

function game_repack_decrypt_url($hash) {
    $key = get_option('game_repack_safelink_key', 'GameRepackTheme2024SecureKey');
    // Base64 decode with URL-safe chars
    $data = str_pad(strtr($hash, '-_', '+/'), strlen($hash) % 4, '=', STR_PAD_RIGHT);
    $decoded = base64_decode($data);
    $plain = '';
    $len = strlen($decoded);
    for ($i = 0; $i < $len; $i++) {
        $plain .= chr(ord($decoded[$i]) ^ ord($key[$i % strlen($key)]));
    }
    $json = json_decode($plain, true);
    if (!$json || !isset($json['url']) || !isset($json['h']) || !isset($json['ts'])) {
        return false;
    }
    $expected_hash = md5($json['url'] . $key . $json['ts']);
    if ($expected_hash !== $json['h']) {
        return false;
    }
    // Check if token is older than 24 hours
    if (time() - $json['ts'] > 86400) {
        return false;
    }
    return $json['url'];
}

// Filter download links through safelink
function game_repack_filter_the_content($content) {
    if (!is_singular(array('game', 'software'))) {
        return $content;
    }
    $enabled = get_theme_mod('game_repack_safelink_enabled', 0);
    if (!$enabled) {
        return $content;
    }
    $base = home_url('/safelink/');
    $pattern = '/(<a[^>]*href="([^"]+)"[^>]*rel="nofollow\s*noopener"[^>]*>.*?<\/a>)/is';
    $content = preg_replace_callback($pattern, function($matches) use ($base) {
        $original_html = $matches[0];
        $url = $matches[2];
        if (strpos($url, 'javascript:') !== false || strpos($url, '#') === 0) {
            return $original_html;
        }
        $safelink = $base . game_repack_encrypt_url($url);
        $modified_html = str_replace($url, $safelink, $original_html);
        return $modified_html;
    }, $content);
    return $content;
}
add_filter('the_content', 'game_repack_filter_the_content', 20);


// =============================================
// SEO: Dynamic XML Sitemap Generator
// =============================================

function game_repack_xml_sitemap_rewrite_rule() {
    add_rewrite_rule('^sitemap\.xml/?$', 'index.php?game_repack_sitemap=1', 'top');
}
add_action('init', 'game_repack_xml_sitemap_rewrite_rule');

function game_repack_sitemap_query_vars($vars) {
    $vars[] = 'game_repack_sitemap';
    return $vars;
}
add_filter('query_vars', 'game_repack_sitemap_query_vars');

function game_repack_sitemap_template_include($template) {
    if (get_query_var('game_repack_sitemap')) {
        header('Content-Type: text/xml; charset=' . get_bloginfo('charset'));
        echo '<?xml version="1.0" encoding="' . get_bloginfo('charset') . '"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';

        // Homepage
        echo '<url><loc>' . esc_url(home_url('/')) . '</loc><lastmod>' . get_modified_date('c') . '</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>';

        // Games
        $games = get_posts(array('post_type' => 'game', 'posts_per_page' => -1, 'post_status' => 'publish'));
        foreach ($games as $game) {
            echo '<url><loc>' . esc_url(get_permalink($game->ID)) . '</loc><lastmod>' . get_post_modified_time('c', false, $game->ID) . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority>';
            $thumb = get_the_post_thumbnail_url($game->ID, 'full');
            if ($thumb) { echo '<image:image><image:loc>' . esc_url($thumb) . '</image:image></image:image>'; }
            echo '</url>';
        }

        // Software
        $softwares = get_posts(array('post_type' => 'software', 'posts_per_page' => -1, 'post_status' => 'publish'));
        foreach ($softwares as $software) {
            echo '<url><loc>' . esc_url(get_permalink($software->ID)) . '</loc><lastmod>' . get_post_modified_time('c', false, $software->ID) . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority>';
            $thumb = get_the_post_thumbnail_url($software->ID, 'full');
            if ($thumb) { echo '<image:image><image:loc>' . esc_url($thumb) . '</image:image></image:image>'; }
            echo '</url>';
        }

        // News
        $news = get_posts(array('post_type' => 'news', 'posts_per_page' => -1, 'post_status' => 'publish'));
        foreach ($news as $article) {
            echo '<url><loc>' . esc_url(get_permalink($article->ID)) . '</loc><lastmod>' . get_post_modified_time('c', false, $article->ID) . '</lastmod><changefreq>daily</changefreq><priority>0.7</priority>';
            $thumb = get_the_post_thumbnail_url($article->ID, 'full');
            if ($thumb) { echo '<image:image><image:loc>' . esc_url($thumb) . '</image:image></image:image>'; }
            echo '</url>';
        }

        // Tutorials
        $tutorials = get_posts(array('post_type' => 'tutorial', 'posts_per_page' => -1, 'post_status' => 'publish'));
        foreach ($tutorials as $tutorial) {
            echo '<url><loc>' . esc_url(get_permalink($tutorial->ID)) . '</loc><lastmod>' . get_post_modified_time('c', false, $tutorial->ID) . '</lastmod><changefreq>weekly</changefreq><priority>0.6</priority>';
            $thumb = get_the_post_thumbnail_url($tutorial->ID, 'full');
            if ($thumb) { echo '<image:image><image:loc>' . esc_url($thumb) . '</image:image></image:image>'; }
            echo '</url>';
        }

        // Regular Posts
        $posts = get_posts(array('post_type' => 'post', 'posts_per_page' => -1, 'post_status' => 'publish'));
        foreach ($posts as $post) {
            echo '<url><loc>' . esc_url(get_permalink($post->ID)) . '</loc><lastmod>' . get_post_modified_time('c', false, $post->ID) . '</lastmod><changefreq>weekly</changefreq><priority>0.6</priority></url>';
        }

        echo '</urlset>';
        exit;
    }
    return $template;
}
add_filter('template_include', 'game_repack_sitemap_template_include');


// =============================================
// SEO: Open Graph & Twitter Cards Meta Tags
// =============================================

function game_repack_output_og_tags() {
    if (is_singular()) {
        global $post;
        $type = get_post_type($post->ID);
        $title = get_the_title($post->ID);
        $description = wp_strip_all_tags(get_the_excerpt($post->ID));
        $image = get_the_post_thumbnail_url($post->ID, 'large');
        $url = get_permalink($post->ID);
        $blog_name = get_bloginfo('name');
        if (!$image) { $image = get_theme_mod('game_repack_og_default_image', ''); }
        if (!$description) { $description = get_bloginfo('description'); }
        ?>
        <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">
        <meta property="og:type" content="<?php echo in_array($type, array('game', 'software')) ? 'article' : 'article'; ?>">
        <meta property="og:title" content="<?php echo esc_attr($title); ?>">
        <meta property="og:description" content="<?php echo esc_attr($description); ?>">
        <meta property="og:url" content="<?php echo esc_url($url); ?>">
        <meta property="og:site_name" content="<?php echo esc_attr($blog_name); ?>">
        <?php if ($image) : ?>
        <meta property="og:image" content="<?php echo esc_url($image); ?>">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:type" content="image/jpeg">
        <?php endif; ?>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
        <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
        <?php if ($image) : ?>
        <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
        <?php endif; ?>
        <?php
    } else {
        ?>
        <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <meta property="og:description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
        <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
        <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php
    }
}
add_action('wp_head', 'game_repack_output_og_tags', 20);


// =============================================
// SEO: Breadcrumbs Rich Snippets (Schema.org)
// =============================================

function game_repack_breadcrumb_json_ld() {
    if (!is_singular() && !is_archive() && !is_home() && !is_search()) { return; }
    $items = array();
    $items[] = array('name' => get_bloginfo('name'), 'url' => esc_url(home_url('/')));
    if (is_singular('game')) {
        $items[] = array('name' => __('Games', 'game-repack'), 'url' => esc_url(get_post_type_archive_link('game')));
        $terms = get_the_terms(get_the_ID(), 'game_genre');
        if ($terms && !is_wp_error($terms)) { $items[] = array('name' => $terms[0]->name, 'url' => esc_url(get_term_link($terms[0]))); }
        $items[] = array('name' => get_the_title(), 'url' => esc_url(get_permalink()));
    } elseif (is_singular('software')) {
        $items[] = array('name' => __('Software', 'game-repack'), 'url' => esc_url(get_post_type_archive_link('software')));
        $terms = get_the_terms(get_the_ID(), 'software_category');
        if ($terms && !is_wp_error($terms)) { $items[] = array('name' => $terms[0]->name, 'url' => esc_url(get_term_link($terms[0]))); }
        $items[] = array('name' => get_the_title(), 'url' => esc_url(get_permalink()));
    } elseif (is_singular('news')) {
        $items[] = array('name' => __('News', 'game-repack'), 'url' => esc_url(get_post_type_archive_link('news')));
        $items[] = array('name' => get_the_title(), 'url' => esc_url(get_permalink()));
    } elseif (is_singular('tutorial')) {
        $items[] = array('name' => __('Tutorials', 'game-repack'), 'url' => esc_url(get_post_type_archive_link('tutorial')));
        $items[] = array('name' => get_the_title(), 'url' => esc_url(get_permalink()));
    } elseif (is_singular('post')) {
        $items[] = array('name' => __('Blog', 'game-repack'), 'url' => esc_url(home_url('/blog/')));
        $cats = get_the_category();
        if ($cats) { $items[] = array('name' => $cats[0]->name, 'url' => esc_url(get_category_link($cats[0]->term_id))); }
        $items[] = array('name' => get_the_title(), 'url' => esc_url(get_permalink()));
    } elseif (is_archive()) {
        $items[] = array('name' => get_the_archive_title(), 'url' => esc_url(get_pagenum_url()));
    } elseif (is_search()) {
        $items[] = array('name' => sprintf(__('Search Results for: %s', 'game-repack'), get_search_query()), 'url' => esc_url(get_pagenum_url()));
    }
    if (count($items) <= 1) { return; }
    $ld_json = array('@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => array());
    foreach ($items as $i => $item) {
        $ld_json['itemListElement'][] = array('@type' => 'ListItem', 'position' => $i + 1, 'name' => $item['name'], 'item' => $item['url']);
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($ld_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
add_action('wp_head', 'game_repack_breadcrumb_json_ld', 25);
