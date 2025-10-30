<article>
    <div class="w-full h-full bg-darkgray p-40 mb-48">
        <a class="no-underline" href="<?php the_permalink();?>">
        <h2 class="py-12 text-30 font-900"><?php the_title();?></h2>
        </a>
        <?php
            $terms = get_the_terms(get_the_ID(),'category');
            if ( $terms && ! is_wp_error( $terms ) ) :
                $tag_links = array();
                foreach ( $terms as $term ) {
                    $tag_links[] = '<a class="no-underline text-30 text-cyan font-times italic" href="'.get_term_link($term->slug,'category').'">'.$term->name.'</a>';
                }
                $tags = join( ", ", $tag_links );
                echo $tags;
            ?>
        <?php endif;?>
        <p class=" text-white pt-12"><?php the_excerpt(); ?></p>
    </div>
</article>
