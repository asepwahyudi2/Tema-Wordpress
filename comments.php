<?php if(post_password_required()) return; ?>
<div class="comments-area">
<?php if(have_comments()): ?><h3 class="comments-title"><i class="fas fa-comments"></i> <?php comments_number('No Comments','1 Comment','% Comments'); ?></h3><ol class="comment-list"><?php wp_list_comments(['style'=>'ol','short_ping'=>true,'avatar_size'=>40]); ?></ol><?php if(get_comment_pages_count()>1 && get_option('page_comments')): ?><nav class="comment-navigation"><div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div><div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div></nav><?php endif; endif; ?>
<?php if(comments_open()): comment_form(['title_reply'=>'<i class="fas fa-pen"></i> Leave a Comment','label_submit'=>'Post Comment','comment_notes_after'=>'']); else: ?><p style="color:var(--text-muted);">Comments are closed.</p><?php endif; ?>
</div>
