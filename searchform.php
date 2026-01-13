<?php
/**
 * Searchform.
 *
 * Custom template for search form
 */
?>
<!-- BEGIN of search form -->
<div class="search">

    <form method="get" class="search__form" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" name="s" class="search__input" placeholder="<?php _e('Search', 'fwp'); ?>"
               value="<?php echo get_search_query(); ?>" aria-label="<?php _e('Search input', 'fwp'); ?>" />
        <button type="submit" name="submit" class="search__submit"
                aria-label="<?php _e('Submit search', 'fwp'); ?>"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<!-- END of search form -->
