<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

    
<?php require dirname( __FILE__ ) . '/sections/hero-homepage.php'; ?>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>