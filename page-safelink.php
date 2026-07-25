<?php get_header(); ?>
<div class="site-content"><main class="main-content">
<?php game_repack_breadcrumb(); ?>

<?php
$ref = isset($_GET['ref']) ? sanitize_text_field(wp_unslash($_GET['ref'])) : '';
if (!$ref) {
    echo '<div class="error-404" style="padding:60px 20px;"><h1>404</h1><p>Safelink tidak ditemukan.</p><a href="' . esc_url(home_url('/')) . '" class="btn-home" style="display:inline-block;margin-top:20px;"><i class="fas fa-home"></i> Kembali ke Beranda</a></div>';
    get_sidebar(); get_footer(); exit;
}
$safe_url = game_repack_decrypt_url($ref);
if (!$safe_url) {
    echo '<div class="error-404" style="padding:60px 20px;"><h1>Error</h1><p>Link download tidak valid atau sudah kedaluwarsa.</p><a href="' . esc_url(home_url('/')) . '" class="btn-home" style="display:inline-block;margin-top:20px;"><i class="fas fa-home"></i> Kembali ke Beranda</a></div>';
    get_sidebar(); get_footer(); exit;
}

$ad_before = get_theme_mod('game_repack_safelink_before_download_ad_code');
?>

<div class="safelink-page" style="max-width:700px;margin:30px auto;background:var(--bg-card);border-radius:var(--radius);border:1px solid var(--border-color);overflow:hidden;">
    <?php if ($ad_before) : ?>
    <div class="safelink-ad-top" style="background:var(--bg-secondary);border-bottom:1px solid var(--border-color);text-align:center;padding:20px;">
        <?php echo wp_kses_post(wpautop($ad_before)); ?>
    </div>
    <?php endif; ?>
    
    <div class="safelink-content" style="padding:40px 30px;text-align:center;">
        <h2 style="font-size:24px;margin-bottom:16px;display:flex;align-items:center;justify-content:center;gap:10px;">
            <i class="fas fa-shield-halved" style="color:var(--accent-green);"></i> Link Keamanan Aktif
        </h2>
        <p style="color:var(--text-secondary);margin-bottom:30px;font-size:15px;">Tunggu sebentar dan klik tombol di bawah untuk memulai pengunduhan.</p>

        <div id="safelink-timer-box" style="margin-bottom:24px;">
            <div id="safelink-countdown" style="font-size:56px;font-weight:900;background:var(--gradient-purple);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;margin-bottom:8px;">10</div>
            <p style="color:var(--text-muted);font-size:13px;margin:0;">detik lagi...</p>
            
            <div id="safelink-progress" style="width:100%;height:6px;background:var(--bg-primary);border-radius:999px;margin-top:16px;overflow:hidden;">
                <div id="safelink-progress-bar" style="width:0%;height:100%;background:var(--gradient-purple);border-radius:999px;transition:width linear;"></div>
            </div>
        </div>

        <button type="button" id="safelink-btn" disabled style="background:linear-gradient(135deg,#6b7280,#9ca3af);color:#fff;border:none;padding:16px 48px;border-radius:999px;font-size:16px;font-weight:900;cursor:not-allowed;transition:var(--transition);opacity:0.5;">
            <i class="fas fa-hourglass-half"></i> Tunggu Tercapai Dulu
        </button>

        <a href="<?php echo esc_url($safe_url); ?>" id="safelink-direct-link" target="_blank" rel="nofollow noopener" style="display:none;">
            <button type="button" style="background:linear-gradient(135deg,var(--accent-green),#059669);color:#fff;border:none;padding:16px 48px;border-radius:999px;font-size:16px;font-weight:900;cursor:pointer;transition:var(--transition);box-shadow:var(--shadow-glow);">
                <i class="fas fa-download"></i> Mulai Unduh Sekarang
            </button>
        </a>
    </div>

    <?php if (count($items) > 0 && in_array('Download Link', $items)) : ?>
    <div class="safelink-warning" style="padding:20px 30px;background:rgba(239,68,68,.08);border-top:1px solid rgba(239,68,68,.2);">
        <p style="color:var(--accent-red);font-size:13px;margin:0;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-triangle-exclamation"></i> 
            <span>Harap nonaktifkan adblocker Anda jika tombol unduh tidak muncul setelah timer tercapai.</span>
        </p>
    </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var duration = <?php echo intval(get_theme_mod('game_repack_safelink_timer_duration', 10)); ?>;
    var remaining = duration;
    var btn = document.getElementById('safelink-timer-box') ? null : null;
    var countdownEl = document.getElementById('safelink-countdown');
    var progressBar = document.getElementById('safelink-progress-bar');
    var actionBtn = document.getElementById('safelink-btn');
    var directLink = document.getElementById('safelink-direct-link');
    var url = '<?php echo esc_url_raw($safe_url); ?>';

    function updateDisplay() {
        if (countdownEl) countdownEl.textContent = remaining;
        if (progressBar) progressBar.style.width = ((1 - remaining / duration) * 100) + '%';
    }

    function startTimer() {
        if (!countdownEl || !progressBar) return;
        var interval = setInterval(function() {
            remaining--;
            updateDisplay();
            if (remaining <= 0) {
                clearInterval(interval);
                if (actionBtn) {
                    actionBtn.style.display = 'none';
                }
                if (directLink) {
                    directLink.style.display = 'inline-block';
                    directLink.querySelector('button').innerHTML = '<i class="fas fa-download"></i> Mulai Unduh Sekarang';
                }
                if (countdownEl) countdownEl.innerHTML = '<i class="fas fa-check-circle" style="font-size:42px;color:var(--accent-green);-webkit-text-fill-color:initial;"></i>';
                if (progressBar) progressBar.style.width = '100%';
            }
        }, 1000);
    }

    setTimeout(startTimer, 500);
});
</script>

</main><?php get_sidebar(); ?></div><?php get_footer(); ?>
