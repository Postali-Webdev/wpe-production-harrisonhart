<?php
/**
 * Template Name: Client Reviews
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();
?>
<!-- client reviews page -->
<?php require dirname( __FILE__ ) . '/sections/hero-generic.php'; ?>

<section class="max-w-1920 mx-auto bg-gray text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Reviews', 'first'=>true) ) ;?>
    <div class="max-w-1200 wrapper mx-auto w-full">  
    
        <?php
            // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $review_args = array(
                'post_type' => 'testimonials',
                'paged' => $paged,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'posts_per_page' => 10, 
            );
            global $reviews;
            $reviews = new WP_Query($review_args);
            $total = $reviews->post_count;
            if($reviews-> have_posts() ):

                echo '<div class="client-reviews pb-40">';
                while ( $reviews->have_posts() ) : $reviews->the_post();
                ?>
                <article>
                    <div class="w-full h-full bg-darkgray p-40 mb-48">
                        <h2 class="case-result text-center py-12 text-28 768:text-50 font-lato font-900">“<?php the_title();?>”</h2>
                        <div class="dashline"></div>
                        <p class=" text-white pt-12"><?php the_content(); ?></p>
                    </div>
                </article>
                <?php
                endwhile;
                echo '</div>';

                get_template_part('partials/pagination',null,array('query'=>$reviews));
                wp_reset_postdata(); 
            endif;
            ?>
        
    </div>
</section>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>