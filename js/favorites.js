jQuery(document).ready(function($) {
    $('.btn-favorite').on('click', function(e) {
        e.preventDefault();
        var button = $(this);
        var postId = button.data('post-id');
        var icon = button.find('i');
        var label = button.find('span');

        button.prop('disabled', true);

        $.ajax({
            url: gameRepackFavs.ajax_url,
            type: 'POST',
            data: {
                action: 'game_repack_toggle_favorite',
                nonce: gameRepackFavs.nonce,
                post_id: postId
            },
            success: function(response) {
                button.prop('disabled', false);
                if (response.success) {
                    if (response.data.status === 'added') {
                        button.addClass('fav-active');
                        icon.removeClass('far').addClass('fas');
                        label.text('Favorited');
                    } else {
                        button.removeClass('fav-active');
                        icon.removeClass('fas').addClass('far');
                        label.text('Add to Favorites');
                    }
                }
            },
            error: function() {
                button.prop('disabled', false);
            }
        });
    });
});
