<?php
echo '<div class="pagination mt-48 justify-center w-full flex flex-no-wrap items-center text-white">';
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    ) );
echo '</div>';
?>