<?php
/**
 * Template Name: Blog Page
 *
 * @author Postali LLC
 */
get_header();?>
<!-- blog page template -->
<?php require dirname( __FILE__ ) . '/sections/hero-generic.php'; ?>

<section class="max-w-1920 mx-auto bg-gray text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Blog Posts') ) ;?>
    <div class="max-w-1400 wrapper mx-auto w-full pt-96 pb-20">  
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $max = 8;
            $blog_args = array(
                'post_type' => 'post',
                'paged' => $paged,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'posts_per_page' => $max, 
            );
            
            $blogs = new WP_Query($blog_args);
            $total = $blogs->post_count;
            if($blogs-> have_posts() ):
                
                echo '<div class="blogs-container 480:flex flex-wrap">';
                while ( $blogs->have_posts() ) : $blogs->the_post();
                    get_template_part('partials/blog-thumb');
                endwhile;
                echo '</div>';

                get_template_part('partials/pagination',null,array('query'=>$blogs));

            endif;
            wp_reset_postdata(); 
            // wp_reset_query();
        ?>
    </div>
</section>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>


<?php get_footer();?>