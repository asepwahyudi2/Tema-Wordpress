jQuery(document).ready(function($) {
    function filterPosts() {
        var postType = $('#filter-post-type').val();
        var termId = $('#filter-genre').val();
        var sort = $('#filter-sort').val();
        var resultsContainer = $('#ajax-filter-results');

        resultsContainer.css('opacity', '0.5');

        $.ajax({
            url: gameRepackAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'game_repack_filter',
                nonce: gameRepackAjax.nonce,
                post_type: postType,
                term_id: termId,
                sort: sort
            },
            success: function(response) {
                resultsContainer.css('opacity', '1');
                if (response.success) {
                    resultsContainer.html(response.data.html);
                    // Re-apply IntersectionObserver for lazy animations if exists
                    if ('IntersectionObserver' in window) {
                        var observer = new IntersectionObserver(function (entries) {
                            entries.forEach(function (entry) {
                                if (entry.isIntersecting) {
                                    entry.target.style.opacity = '1';
                                    entry.target.style.transform = 'translateY(0)';
                                    observer.unobserve(entry.target);
                                }
                            });
                        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

                        resultsContainer.find('.game-card').each(function () {
                            this.style.opacity = '0';
                            this.style.transform = 'translateY(20px)';
                            this.style.transition = 'all 0.5s ease';
                            observer.observe(this);
                        });
                    }
                }
            },
            error: function() {
                resultsContainer.css('opacity', '1');
            }
        });
    }

    $('#filter-genre, #filter-sort').on('change', function() {
        filterPosts();
    });
});
