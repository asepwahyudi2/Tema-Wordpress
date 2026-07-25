<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" name="s" placeholder="Search games..." value="<?php echo esc_attr(get_search_query()); ?>" required />
    <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
</form>
