<?php
/**
 * Single template
 *
 * @author Postali LLC
 */
get_header();?>
<!-- single -->

<article class="max-w-1920 mx-auto  bg-gray text-white w-full relative">
    <?php
    $blogDefault = get_field('default_blog_image', 'options');
    if ( has_post_thumbnail() ) {
        $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $bg_image = $featImg[0];
    } else { 
        $bg_image = $blogDefault;
    }?>
    <div class="max-w-1920 wrapper mx-auto mt-96 bg-darkgray">
        <div class="max-w-1400 mx-auto  py-96 1025:flex justify-between">
            <div class="w-full 1025:w-1/2 1025:mr-10">
                <p class="text-red text-16 pb-12"><?php the_date(); ?></p>
                <h1 class="pb-24"><?php the_title(); ?></h1>
                <div class="dashline dashline--left"></div>
                <h4 class="tags pb-24"><?php the_category( ', ' ); ?></h4>
                <?php
                    $attorney = get_field('blog_published_by_attorney');
                    $bio_link = get_field('link_to_bio_page',$attorney);
                    $publisher = get_field('first_name',$attorney).' '.get_field('middle_initial',$attorney).' '.get_field('last_name',$attorney).' '.get_field('suffix',$attorney);
                ?>
                <div class="blog-author flex items-center py-24">
                    <div class="blog-author__headshot bg-top bg-no-repeat bg-cover" style="background-image:url('<?php echo esc_url(get_field('headshot',$attorney)['url']);?>')"></div>
                    <p class="text-16 ml-12">Published by <a class="text-cyan" href="<?php echo $bio_link;?>"><?php echo $publisher;?></a></p>
                </div>
            </div>
            <div class="w-full 1025:w-1/2 1025:ml-10">
                <img src="<?php echo esc_url($bg_image); ?>"/>
            </div>
        </div>
    </div>

    <div class="wrapper mx-auto w-full pt-96 pb-20">  
        <div class="max-w-900 mx-auto w-full  text-white">
            <div class="wysiwyg">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>


<?php get_footer();?>