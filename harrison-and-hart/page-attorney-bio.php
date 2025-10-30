<?php
/**
 * Template Name: Attorney Bio
 * @author Postali LLC
**/
get_header();

$attorney = get_field('attorney');
$id = $attorney->ID;

?>
<!-- page-attorney-bio -->
<?php require dirname( __FILE__ ) . '/sections/hero-attorney-bio.php'; ?>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>