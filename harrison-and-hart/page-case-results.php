<?php
/**
 * Template Name: Case Results
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();
?>
<!-- page-case-results.php -->
<?php require dirname( __FILE__ ) . '/sections/hero-generic.php'; ?>

<section class="max-w-1920 mx-auto bg-background text-white w-full relative">
    <div class="max-w-1200 wrapper mx-auto w-full pb-20">
        <h2 class="text-white">Page Case-Results</h2>
        <?php get_template_part('partials/taxonomy-filter',null,array('taxonomy'=>'result-topic','post-type'=>'case-results'));?>
        <?php
            // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $max = 10;
            $result_args = array(
                'post_type' => 'case-results',
                'paged' => $paged,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'posts_per_page' => $max, 
            );
            global $results;
            $results = new WP_Query($result_args);
            $total = $results->post_count;
            if($results-> have_posts() ):

                echo '<div class="case-results">';
                while ( $results->have_posts() ) : $results->the_post();
                ?>
                <article>
                    <div class="w-full h-full bg-darkgray p-40 mb-48">
                        <h2 class="case-result py-12 text-28 768:text-50 font-lato font-900"><?php the_title();?></h2>
                        <?php
                            $terms = get_the_terms(get_the_ID(),'result-topic');
                            if ( $terms && ! is_wp_error( $terms ) ) :
                                $tag_links = array();
                                foreach ( $terms as $term ) {
                                    $tag_links[] = '<a class="text-30 text-cyan font-times italic" href="'.get_term_link($term->slug,'result-topic').'">'.$term->name.'</a>';
                                }
                                $tags = join( ", ", $tag_links );
                                echo $tags;
                            ?>
                        <?php endif;?>
                        <p class=" text-white pt-12"><?php the_content(); ?></p>
                    </div>
                </article>
                <?php
                endwhile;
                echo '</div>';

                get_template_part('partials/pagination',null,array('query'=>$results));
                wp_reset_postdata(); 
            endif;
            ?>
    </div>
</section>


<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>