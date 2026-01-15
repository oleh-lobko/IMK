<?php
/**
 * Films Table Section.
 */
$film_table_id = get_field('film_table') ?: '';
if (!empty($film_table_id)) { ?>
    <section class="films">
        <div class="grid-container grid-container--s">
            <?php
            if (function_exists('tablepress_print_table')) {
                tablepress_print_table([
                    'id' => $film_table_id,
                    'column_set' => 'all',
                ]);
            }
            ?>
        </div>
    </section>
<?php } ?>
