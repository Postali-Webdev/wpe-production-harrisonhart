<?php
/**
 * Template Name: Staff Page
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();?>

<?php require dirname( __FILE__ ) . '/partials/breadcrumbs.php'; ?>  

<?php require dirname( __FILE__ ) . '/sections/hero-generic.php'; ?>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>

<?php

$staff_args = array(
    'post_type' => 'staff',
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'posts_per_page' => -1, 
);
$staff = new WP_Query($staff_args);
if($staff-> have_posts()):
?>
<section class="max-w-1920 pb-96 mx-auto <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true, 'label'=>'Our Team','first'=>true) ) ;?>
    <div class="mx-auto w-full relative wrapper max-w-1025">
        <?php while ( $staff->have_posts() ) : $staff->the_post(); ?>
            <div class="card relative mb-80 p-40 768:px-64 bg-darkgray">
                <div class="absolute staff-headshot">
                    <?php if ( has_post_thumbnail() ) {
                        $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
                        echo '<img src="'.$featImg.'"/>';
                        };
                    ?>
                </div>
                <div class="1200:ml-72 flex flex-nowrap items-center">
                    <div class="wysiwyg mt-24 768:mt-48">
                        <h2 class="title text-22 768:text-50"><?php the_title();?></h2>
                        <p class="font-times text-cyan text-22 768:text-30 italic"><?php echo get_field('job_title',$post->ID);?></p>
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    </div>
</section>
<?php endif;?>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>