<?php
/**
 * 
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();
?>
<!-- home.php -->
<?php get_template_part('sections/hero-generic', null, array('post_id'=>get_field('global_blog_page','options'))); ?>

<section class="max-w-1920 mx-auto bg-background text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Blog Posts') ) ;?>
    <div class="max-w-1200 wrapper mx-auto w-full pb-20">
        <?php get_template_part('partials/taxonomy-filter',null,array('taxonomy'=>'category','post-type'=>'posts'));?>
        <?php
            if ( have_posts() ) :?>
            <div class="blogs-container">
                <?php
                while ( have_posts() ) : the_post(); 
                    get_template_part('partials/blog-thumb');
                endwhile;?>
            </div>
            <?php get_template_part('partials/pagination'); ?>
        <?php endif;?>
    </div>
</section>


<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>