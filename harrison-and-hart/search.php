<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
$breadcrumbs = true;
get_header(); ?>

<section id="search-results" class="max-w-1920 mx-auto bg-dkBlue text-white w-full relative">
    <div class="bg-right-top bg-no-repeat bg-cover w-full h-full relative" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(776),'full'); ?>');">
        <div class="max-w-1200 wrapper mx-auto w-full pt-96 pb-20">
            <h2 class="my-48"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h2>

            <?php if ( have_posts() ) : ?>

                <?php //get_search_form(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="result-list">
						<div class="result">
							<p class="text-14 pb-12 text-red"><?php echo get_the_date( 'l F j, Y' );?></iv>
							<h3 class="pb-12">
                                <a href="<?php the_permalink();?>">
                                <?php the_title();?>
							    </a>
                            </h3>
                            <p><?php echo wp_strip_all_tags(strip_shortcodes(get_the_excerpt()));?></p>
                            <hr class="opacity-15 mt-12 pb-24">
						</div>
					</div>

                <?php endwhile; ?>

                <?php get_template_part('partials/pagination', null, array('query'=>$wp_query )); ?>

            <?php else : ?>

                <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                <div class="search-form-container">
                    <?php get_search_form(); ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer();
