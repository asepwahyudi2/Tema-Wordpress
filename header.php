<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
<div class="header-inner">
    <div class="site-logo">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
        <?php endif; ?>
    </div>
    <button class="menu-toggle" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>
    <nav class="main-nav" aria-label="Primary navigation">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'fallback_cb' => 'game_repack_default_menu',
        )); ?>
    </nav>
    <?php if (function_exists('game_repack_header_auth_links')) { game_repack_header_auth_links(); } ?>
    <div class="header-search"><?php get_search_form(); ?></div>
</div>
</header>
<?php if (!is_singular() || is_singular()) { $header_ad = get_theme_mod('game_repack_header_ad_code'); if ($header_ad) { echo '<div class="site-ad-header" style="background:var(--bg-secondary);border-bottom:1px solid var(--border-color);text-align:center;padding:16px 20px;">' . wp_kses_post(wpautop($header_ad)) . '</div>'; } } ?>
