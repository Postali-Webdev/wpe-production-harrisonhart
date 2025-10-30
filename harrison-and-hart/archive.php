<?php
/**
 * 
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();
?>
<!-- archive.php -->
<?php get_template_part('sections/hero-generic', null, array('post_id'=>get_field('global_case_results_page','options'))); ?>

<section class="max-w-1920 mx-auto bg-background text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Case Results') ) ;?>
    <div class="max-w-1200 wrapper mx-auto w-full pb-20">
        <?php get_template_part('partials/taxonomy-filter',null,array('taxonomy'=>'result-topic','post-type'=>'case-results'));?>
        <?php
            if ( have_posts() ) :?>
            <div class="case-results">
                <?php while ( have_posts() ) : the_post(); ?>
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
                                endif;?>
                            <p class=" text-white pt-12"><?php the_content(); ?></p>
                        </div>
                    </article>
                <?php endwhile;?>
                <?php get_template_part('partials/pagination'); ?>
            </div>
            <?php endif;?>
    </div>
</section>


<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>