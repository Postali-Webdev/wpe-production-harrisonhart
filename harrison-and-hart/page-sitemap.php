<?php
/**
 * Template Name: Sitemap
 *
 * @author Postali LLC
 */
$breadcrumbs = true;
get_header();?>

<?php require dirname( __FILE__ ) . '/partials/breadcrumbs.php'; ?> 

<section class="hero relative max-w-1920 mx-auto bg-gray text-white w-full">
    <div class="hero__contents max-w-1920 wrapper pt-120 bg-darkgray">
        <div class="breadcrumb-spacer"></div>
        <div class="max-w-900 pt-64 mx-auto flex flex-nowrap">
            <div class="icon-container text-cyan icon-logo-circle"></div>
            <h1 class="">Sitemap</h1>
        </div>
    </div>
    <div class="max-w-900 mx-auto py-96">
        <div class="sitemap">
            <?php if ( have_posts() ) : 
                while (have_posts()) : the_post(); ?>
                <section class="sitemap-page">
                    <div class="container">
                        <div><!-- But dat page content, tho -->
                            <h2>Pages</h2> 		<br>	
                            <ul class="list">
                                <?php wp_list_pages("title_li=" ); ?>
                            </ul>
                        </div><!-- page-content -->

                        <div>
                            <div>
                                <br>
                                <h2>Blog Posts</h2> 	<br>
                                <ul class="list">		
                                    <?php wp_get_archives('type=postbypost'); ?>
                                </ul>
                            </div><!-- page sidebar -->
                        </div>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>
<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>
<?php get_footer();?>